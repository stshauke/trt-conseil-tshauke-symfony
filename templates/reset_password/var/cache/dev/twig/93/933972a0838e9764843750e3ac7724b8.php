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

/* reset_password/request.html.twig */
class __TwigTemplate_d0f30eb7e4708657476e99ffc764e5d8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/request.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/request.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "reset_password/request.html.twig", 1);
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

        echo "Reset your password
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
\t\t\t\t\t\t\t\tThe best offer
\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t<span class=\"text-primary\">for your business</span>
\t\t\t\t\t\t\t</h1>
\t\t\t\t\t\t\t<p style=\"color: hsl(217, 10%, 50.8%)\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet consectetur adipisicing elit.
\t\t\t\t\t\t\t\t              Eveniet, itaque accusantium odio, soluta, corrupti aliquam
\t\t\t\t\t\t\t\t              quibusdam tempora at cupiditate quis eum maiores libero
\t\t\t\t\t\t\t\t              veritatis? Dicta facilis sint aliquid ipsum atque?
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"col-lg-6 mb-5 mb-lg-0\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body py-5 px-md-5\">
\t\t\t\t\t\t\t\t\t";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 33, $this->source); })()), "flashes", ["reset_password_error"], "method", false, false, false, 33));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 34
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, $context["flash_error"], "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "\t\t\t\t\t\t\t\t\t<h2>Réinitialisez votre M.P</h2>

\t\t\t\t\t\t\t\t\t";
        // line 38
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["requestForm"]) || array_key_exists("requestForm", $context) ? $context["requestForm"] : (function () { throw new RuntimeError('Variable "requestForm" does not exist.', 38, $this->source); })()), 'form_start');
        echo "
\t\t\t\t\t\t\t\t\t<!-- Email input -->
\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">

\t\t\t\t\t\t\t\t\t\t";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["requestForm"]) || array_key_exists("requestForm", $context) ? $context["requestForm"] : (function () { throw new RuntimeError('Variable "requestForm" does not exist.', 42, $this->source); })()), "email", [], "any", false, false, false, 42), 'row', ["attr" => ["class" => "form-control"]]);
        // line 44
        echo "
\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t<small>
\t\t\t\t\t\t\t\t\t\t\t\tEntrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.
\t\t\t\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Submit button -->
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<button class=\"btn btn-primary  btn-block mb-4\">Envoyer un e-mail de réinitialisation</button>
\t\t\t\t\t\t\t\t\t";
        // line 55
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["requestForm"]) || array_key_exists("requestForm", $context) ? $context["requestForm"] : (function () { throw new RuntimeError('Variable "requestForm" does not exist.', 55, $this->source); })()), 'form_end');
        echo "
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
        return "reset_password/request.html.twig";
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
        return array (  156 => 55,  143 => 44,  141 => 42,  134 => 38,  130 => 36,  121 => 34,  117 => 33,  89 => 7,  79 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Reset your password
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
\t\t\t\t\t\t\t\tThe best offer
\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t<span class=\"text-primary\">for your business</span>
\t\t\t\t\t\t\t</h1>
\t\t\t\t\t\t\t<p style=\"color: hsl(217, 10%, 50.8%)\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet consectetur adipisicing elit.
\t\t\t\t\t\t\t\t              Eveniet, itaque accusantium odio, soluta, corrupti aliquam
\t\t\t\t\t\t\t\t              quibusdam tempora at cupiditate quis eum maiores libero
\t\t\t\t\t\t\t\t              veritatis? Dicta facilis sint aliquid ipsum atque?
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"col-lg-6 mb-5 mb-lg-0\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body py-5 px-md-5\">
\t\t\t\t\t\t\t\t\t{% for flash_error in app.flashes('reset_password_error') %}
\t\t\t\t\t\t\t\t\t\t<div class=\"alert alert-danger\" role=\"alert\">{{ flash_error }}</div>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t<h2>Réinitialisez votre M.P</h2>

\t\t\t\t\t\t\t\t\t{{ form_start(requestForm) }}
\t\t\t\t\t\t\t\t\t<!-- Email input -->
\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">

\t\t\t\t\t\t\t\t\t\t{{ form_row(requestForm.email, {
                        'attr': {'class': 'form-control'}
                    }) }}
\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t<small>
\t\t\t\t\t\t\t\t\t\t\t\tEntrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.
\t\t\t\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Submit button -->
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<button class=\"btn btn-primary  btn-block mb-4\">Envoyer un e-mail de réinitialisation</button>
\t\t\t\t\t\t\t\t\t{{ form_end(requestForm) }}
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
", "reset_password/request.html.twig", "C:\\Users\\scrapy joyce\\Desktop\\ECOLE STUDI\\Developpeur Web\\Symfony\\trt-conseil-tshauke-symfony\\templates\\reset_password\\request.html.twig");
    }
}
