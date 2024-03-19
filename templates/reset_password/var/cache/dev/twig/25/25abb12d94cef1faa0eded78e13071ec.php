<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* security/login.html.twig */
class __TwigTemplate_10f4f67abf803b2d1d410102f3291d98 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Log in!
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "\t<div
\t\tclass=\"container mt-5\">
\t\t<!-- Section: Design Block -->
\t\t<section
\t\t\tclass=\"\">
\t\t\t<!-- Jumbotron -->
\t\t\t<div class=\"px-4 py-5 px-md-5 text-center text-lg-start\" style=\"background-color: hsl(0, 0%, 96%)\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row gx-lg-5 align-items-center\">
\t\t\t\t\t\t<div class=\"col-lg-6 mb-5 mb-lg-0\">
\t\t\t\t\t\t\t<h1 class=\"my-5 display-3 fw-bold ls-tight\">
\t\t\t\t\t\t\t\tTRT Conseil
\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t<span class=\"text-primary\">for your business</span>
\t\t\t\t\t\t\t</h1>
\t\t\t\t\t\t\t<p style=\"color: hsl(217, 10%, 50.8%)\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet consectetur adipisicing elit.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t            quibusdam tempora at cupiditate quis eum maiores libero
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t            veritatis? Dicta facilis sint aliquid ipsum atque?
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"col-lg-6 mb-5 mb-lg-0\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body py-5 px-md-5\">
\t\t\t\t\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t\t\t\t\t";
        // line 34
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 34, $this->source); })())) {
            // line 35
            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 35, $this->source); })()), "messageKey", [], "any", false, false, false, 35), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 35, $this->source); })()), "messageData", [], "any", false, false, false, 35), "security"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 37
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 38
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38)) {
            // line 39
            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t\t\t\t\t\tYou are logged in as
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 41, $this->source); })()), "user", [], "any", false, false, false, 41), "userIdentifier", [], "any", false, false, false, 41), "html", null, true);
            echo ",
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 42
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            echo "\">Logout</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 45
        echo "\t\t\t\t\t\t\t\t\t\t<!-- 2 column grid layout with text inputs for the first and last names -->
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<h1 class=\"h3 mb-3 font-weight-normal\">Veuillez vous connecter</h1>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<!-- Email input -->
\t\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">

\t\t\t\t\t\t\t\t\t\t\t<label for=\"inputEmail\">E-mail</label>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"email\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, (isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 54, $this->source); })()), "html", null, true);
        echo "\" name=\"email\" id=\"inputEmail\" class=\"form-control\" autocomplete=\"email\" required autofocus>


\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<!-- Password input -->
\t\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">
\t\t\t\t\t\t\t\t\t\t\t<label for=\"inputPassword\">Mot de passe</label>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control\" autocomplete=\"current-password\" required>

\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">

\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row mb-4\">
\t\t\t\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\t\t\t\tclass=\"col d-flex justify-content-center\">
\t\t\t\t\t\t\t\t\t\t\t\t<!-- Checkbox -->
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"form2Example31\" checked/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"form2Example31\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\tSe rappeler de moi
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\t\t\t\tclass=\"col\">
\t\t\t\t\t\t\t\t\t\t\t\t<!-- Simple link -->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 83
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_forgot_password_request");
        echo "\">Mot de passe oublié?</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t\t<!-- Submit button -->
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block mb-4\">
\t\t\t\t\t\t\t\t\t\t\tSe connecter
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<!-- Jumbotron -->
\t\t</section>
\t\t<!-- Section: Design Block -->
\t</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  191 => 83,  169 => 64,  156 => 54,  145 => 45,  139 => 42,  135 => 41,  131 => 39,  129 => 38,  126 => 37,  120 => 35,  118 => 34,  89 => 7,  79 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Log in!
{% endblock %}

{% block body %}
\t<div
\t\tclass=\"container mt-5\">
\t\t<!-- Section: Design Block -->
\t\t<section
\t\t\tclass=\"\">
\t\t\t<!-- Jumbotron -->
\t\t\t<div class=\"px-4 py-5 px-md-5 text-center text-lg-start\" style=\"background-color: hsl(0, 0%, 96%)\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row gx-lg-5 align-items-center\">
\t\t\t\t\t\t<div class=\"col-lg-6 mb-5 mb-lg-0\">
\t\t\t\t\t\t\t<h1 class=\"my-5 display-3 fw-bold ls-tight\">
\t\t\t\t\t\t\t\tTRT Conseil
\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t<span class=\"text-primary\">for your business</span>
\t\t\t\t\t\t\t</h1>
\t\t\t\t\t\t\t<p style=\"color: hsl(217, 10%, 50.8%)\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet consectetur adipisicing elit.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t            quibusdam tempora at cupiditate quis eum maiores libero
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t            veritatis? Dicta facilis sint aliquid ipsum atque?
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"col-lg-6 mb-5 mb-lg-0\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body py-5 px-md-5\">
\t\t\t\t\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t\t\t\t\t{% if error %}
\t\t\t\t\t\t\t\t\t\t\t<div class=\"alert alert-danger\">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
\t\t\t\t\t\t\t\t\t\t{% endif %}

\t\t\t\t\t\t\t\t\t\t{% if app.user %}
\t\t\t\t\t\t\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t\t\t\t\t\tYou are logged in as
\t\t\t\t\t\t\t\t\t\t\t\t{{ app.user.userIdentifier }},
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"{{ path('app_logout') }}\">Logout</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t<!-- 2 column grid layout with text inputs for the first and last names -->
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<h1 class=\"h3 mb-3 font-weight-normal\">Veuillez vous connecter</h1>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<!-- Email input -->
\t\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">

\t\t\t\t\t\t\t\t\t\t\t<label for=\"inputEmail\">E-mail</label>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"email\" value=\"{{ last_username }}\" name=\"email\" id=\"inputEmail\" class=\"form-control\" autocomplete=\"email\" required autofocus>


\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<!-- Password input -->
\t\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">
\t\t\t\t\t\t\t\t\t\t\t<label for=\"inputPassword\">Mot de passe</label>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control\" autocomplete=\"current-password\" required>

\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row mb-4\">
\t\t\t\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\t\t\t\tclass=\"col d-flex justify-content-center\">
\t\t\t\t\t\t\t\t\t\t\t\t<!-- Checkbox -->
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"form2Example31\" checked/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"form2Example31\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\tSe rappeler de moi
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\t\t\t\tclass=\"col\">
\t\t\t\t\t\t\t\t\t\t\t\t<!-- Simple link -->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"{{ path('app_forgot_password_request') }}\">Mot de passe oublié?</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t\t<!-- Submit button -->
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block mb-4\">
\t\t\t\t\t\t\t\t\t\t\tSe connecter
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<!-- Jumbotron -->
\t\t</section>
\t\t<!-- Section: Design Block -->
\t</div>
{% endblock %}
", "security/login.html.twig", "C:\\Users\\scrapy joyce\\Desktop\\ECOLE STUDI\\Developpeur Web\\Symfony\\trt-conseil-tshauke-symfony\\templates\\security\\login.html.twig");
    }
}
