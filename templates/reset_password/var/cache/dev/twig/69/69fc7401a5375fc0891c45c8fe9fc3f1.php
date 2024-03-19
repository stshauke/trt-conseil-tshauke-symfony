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

/* registration/register.html.twig */
class __TwigTemplate_ef55d4d25b9f40e73281a62852049b43 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "registration/register.html.twig", 1);
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

        echo "Register
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
\t\t\t\t\t\t\t\t            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
\t\t\t\t\t\t\t\t            quibusdam tempora at cupiditate quis eum maiores libero
\t\t\t\t\t\t\t\t            veritatis? Dicta facilis sint aliquid ipsum atque?
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"col-lg-6 mb-5 mb-lg-0\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body py-5 px-md-5\">
\t\t\t\t\t\t\t\t\t";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 35, $this->source); })()), 'errors');
        echo "

\t\t\t\t\t\t\t\t\t";
        // line 37
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 37, $this->source); })()), 'form_start');
        echo "


\t\t\t\t\t\t\t\t\t<!-- 2 column grid layout with text inputs for the first and last names -->
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6 mb-4\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-outline\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"form3Example1\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"form3Example1\">First name</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6 mb-4\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-outline\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"form3Example2\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"form3Example2\">Last name</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Email input -->
\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">
\t\t\t\t\t\t\t\t\t\t";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 58, $this->source); })()), "email", [], "any", false, false, false, 58), 'row', ["attr" => ["class" => "form-control"]]);
        // line 60
        echo "
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Password input -->
\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">
\t\t\t\t\t\t\t\t\t\t";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 65, $this->source); })()), "plainPassword", [], "any", false, false, false, 65), 'row', ["attr" => ["class" => "form-control"]]);
        // line 67
        echo "
\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t<!-- Checkbox -->
\t\t\t\t\t\t\t\t\t<div class=\"form-check d-flex justify-content-center mb-4\">
\t\t\t\t\t\t\t\t\t\t";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 73, $this->source); })()), "agreeTerms", [], "any", false, false, false, 73), 'row', ["attr" => ["class" => "form-check-input me-2"]]);
        // line 75
        echo "


\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Submit button -->
\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block mb-4\">
\t\t\t\t\t\t\t\t\t\tS'enregistrer
\t\t\t\t\t\t\t\t\t</button>


\t\t\t\t\t\t\t\t\t";
        // line 86
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 86, $this->source); })()), 'form_end');
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
        return "registration/register.html.twig";
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
        return array (  182 => 86,  169 => 75,  167 => 73,  159 => 67,  157 => 65,  150 => 60,  148 => 58,  124 => 37,  119 => 35,  89 => 7,  79 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Register
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
\t\t\t\t\t\t\t\t            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
\t\t\t\t\t\t\t\t            quibusdam tempora at cupiditate quis eum maiores libero
\t\t\t\t\t\t\t\t            veritatis? Dicta facilis sint aliquid ipsum atque?
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"col-lg-6 mb-5 mb-lg-0\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body py-5 px-md-5\">
\t\t\t\t\t\t\t\t\t{{ form_errors(registrationForm) }}

\t\t\t\t\t\t\t\t\t{{ form_start(registrationForm) }}


\t\t\t\t\t\t\t\t\t<!-- 2 column grid layout with text inputs for the first and last names -->
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6 mb-4\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-outline\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"form3Example1\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"form3Example1\">First name</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6 mb-4\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-outline\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"form3Example2\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"form3Example2\">Last name</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Email input -->
\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">
\t\t\t\t\t\t\t\t\t\t{{ form_row(registrationForm.email, {
                        'attr': {'class': 'form-control'}
                    }) }}
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Password input -->
\t\t\t\t\t\t\t\t\t<div class=\"form-outline mb-4\">
\t\t\t\t\t\t\t\t\t\t{{ form_row(registrationForm.plainPassword, {
        'attr': {'class': 'form-control'}
    }) }}
\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t<!-- Checkbox -->
\t\t\t\t\t\t\t\t\t<div class=\"form-check d-flex justify-content-center mb-4\">
\t\t\t\t\t\t\t\t\t\t{{ form_row(registrationForm.agreeTerms, {
        'attr': {'class': 'form-check-input me-2'}
    }) }}


\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Submit button -->
\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block mb-4\">
\t\t\t\t\t\t\t\t\t\tS'enregistrer
\t\t\t\t\t\t\t\t\t</button>


\t\t\t\t\t\t\t\t\t{{ form_end(registrationForm) }}
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
", "registration/register.html.twig", "C:\\Users\\scrapy joyce\\Desktop\\ECOLE STUDI\\Developpeur Web\\Symfony\\trt-conseil-tshauke-symfony\\templates\\registration\\register.html.twig");
    }
}
