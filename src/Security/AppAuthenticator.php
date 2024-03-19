<?php

namespace App\Security;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\User\UserInterface;

class AppAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    private $authorizationChecker;
    private $urlGenerator;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(AuthorizationCheckerInterface $authorizationChecker, UrlGeneratorInterface $urlGenerator)
    {
        $this->authorizationChecker = $authorizationChecker;
        $this->urlGenerator = $urlGenerator;
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');
        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $user = $token->getUser();
        
        if ($user instanceof UserInterface && $this->authorizationChecker->isGranted('ROLE_ADMIN')) {
            return new RedirectResponse($this->urlGenerator->generate('app_admin'));
        } elseif ($user instanceof UserInterface && $this->authorizationChecker->isGranted('ROLE_CONSULTANT')) {
            return new RedirectResponse($this->urlGenerator->generate('app_consultant'));
        } elseif ($user instanceof UserInterface && $this->authorizationChecker->isGranted('ROLE_CANDIDAT')) {
            return new RedirectResponse($this->urlGenerator->generate('app_candidat'));
        } elseif ($user instanceof UserInterface && $this->authorizationChecker->isGranted('ROLE_ENTREPRENEUR')) {
            return new RedirectResponse($this->urlGenerator->generate('app_recruteur'));
        }
        
        return new RedirectResponse($this->urlGenerator->generate('home.index'));
    }

    public function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
