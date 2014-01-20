<?php

$PageTitle="Checkout Page - Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "Checkout";
function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->

<div class="container">
      
    <div class="page-header">
        <h1>Checkout  <small>You are 1 step away for happiness</small></h1>
    </div>

{% block checkout %}


{# BEGIN CHECKOUT TWIG TEMPLATE #}
<!-- ###########################################################################
BEGIN checkout
########################################################################### -->

<!--  *********** container ************* -->

<div class="col-md-12">
    {{ html_messages|raw }}
<form id="fc_form_checkout" class="form-inline" method="post" action="https://{{ store_domain }}{{ post_url }}" onsubmit="return false;">




    {% block checkout_error %}
    <div id="fc_form_checkout_error" class="alert alert-warning" style="display:none">{{ lang.checkout_required_info_missing|raw }}</div>
    {% endblock checkout_error %}



    {% block required_hidden_fields %}
    <div id="fc_required_hidden_fields">
        <input type="hidden" id="ThisAction" name="ThisAction" value="checkout" />
        <input type="hidden" id="customer_id" name="customer_id" value="{{ customer_id_encoded }}" />
        <input type="hidden" name="{{ session_name }}" value="{{ session_id }}" />
        {{ csrf_hidden_input|raw }}
        {% if auth_token_is_valid %}
            <input type="hidden" name="fc_auth_token" value="{{ fc_auth_token }}" />
            <input type="hidden" name="timestamp" value="{{ timestamp }}" />
            <input type="hidden" name="fc_customer_id" value="{{ fc_customer_id }}" />
        {% endif %}
        {# preserve paypal express variables #}
        {% if token != '' and payer_id != '' %}
            <input type="hidden" id="token" name="token" value="{{ token }}" />
            <input type="hidden" id="PayerID" name="PayerID" value="{{ payer_id }}" />
        {% endif %}
        {% for var_name, var_value in hosted_gateway_vars %}
            <input type="hidden" name="{{ var_name }}" value="{{ var_value }}" />
        {% endfor %}
    </div>
    {% endblock required_hidden_fields %}



<!--     {% block continue_shopping %}
    <div id="fc_cancel_continue_shopping">
    {% if page_referer != '' and not is_updateinfo %}
        <a href="{{ page_referer }}">{{ lang.checkout_cancel_and_continue|raw }}</a>
    {% endif %}
    </div>
    {% endblock continue_shopping %} -->



    {% block noscript_warning %}
    <noscript>
        <div id="alert alert-warning_noscript" class="alert alert-warning">
            <h3>{{ lang.checkout_warning|raw }}</h3>
            <p>{{ lang.checkout_missing_message|raw }}</p>
        </div><!-- #alert alert-warningNoScript -->
    </noscript>
    {% endblock noscript_warning %}



    {% block login_register %}
    <!--  *********** login_register : Login or Register ************* -->
    <div class="form-group col-md-8 col-md-offset-2" id="fc_login_register_container">
<!--     <h2>{% if checkout_type == 'guest_only' %}{{ lang.checkout_as_guest|raw }}{% else %}{{ lang.checkout_login_or_register|raw }}{% endif %}</h2>
 -->    <fieldset id="fc_login_register">
        <div class="shaded-form col-md-8 col-md-offset-2">
                <legend class="text-center">{% if checkout_type == 'guest_only' %}{{ lang.checkout_as_guest|raw }}{% else %}{{ lang.checkout_login_or_register|raw }}{% endif %}</legend>
            <div id="fc_login_register_list" class="text-center">
        {% if not customer_is_authenticated %}
                <div id="li_customer_email" class="form-group fc_customer_email">
                <input type="text" value="{{ email }}" autocomplete="off" class="form-control  fc_required" id="customer_email" name="customer_email" placeholder="{{ lang.checkout_email|raw }}">
                    <label style="display:none;" class="help-block" for="customer_email">{{ lang.checkout_error_email|raw }}</label>
                    <p class="help-block" id="fc_account_message_status">
                        {{ lang.checkout_instructions_email|raw }}
                    </p>
                    <span style="display:none" id="login_ajax"><img alt="{{ lang.checkout_loading|raw }}" src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1"></span>
                    <p style="display:none;" class="help-block" id="fc_account_message_explanation"></p>
                </div>
            {% if not is_updateinfo and checkout_type != 'guest_only' and checkout_type != 'account_only' %}
                <div class="form-control_radio fc_guest_checkout">
                    <label for="is_anonymous_1" class="form-control">
                        <input type="radio" name="is_anonymous" value="1" id="is_anonymous_1" class="form-control"{% if default_to_guest %} checked="checked"{% endif %} autocomplete="off"/>
                        <span>{{ lang.checkout_as_guest|raw }}</span>
                    </label>
                </div>
                <div class="form-control_radio fc_guest_checkout">
                    <label for="is_anonymous_0" class="form-control">
                        <input type="radio" name="is_anonymous" value="0" id="is_anonymous_0" class="form-control"{% if not default_to_guest %} checked="checked"{% endif %} autocomplete="off" />
                        <span>{{ lang.checkout_as_customer|raw }}</span>
                    </label>
                </div>
            {% else %}
                {% if checkout_type == 'guest_only' %}
                    <input type="hidden" name="is_anonymous" id="is_anonymous" value="1" />
                {% else %}
                    <input type="hidden" name="is_anonymous" id="is_anonymous" value="0" />
                {% endif %}
            {% endif %}
        {% else %}
                <div class="fc_customer_email form-group" id="li_customer_email">
                    <span class="control-label">{{ lang.checkout_email|raw }}<span class="fc_ast">*</span></span>
                    <!-- <span id="customer_email_authenticated" class="form-control">{{ email }}</span> -->
                    <input type="hidden" name="customer_email" id="customer_email" value="{{ email }}" placeholder="{{ lang.checkout_email|raw }}" />
                    <label for="customer_email" class="alert alert-warning" style="display:none;">{{ lang.checkout_error_email|raw }}</label>
                    <p id="fc_account_message_sso" class="help-block">{{ lang.checkout_sso_already_logged_in|raw }}</p
                </div>
        {% endif %}
                <div id="li_customer_password" style="display:none;" class="form-group col-sm-12 fc_customer_password">
                    <p style="display:none;" class="help-block" id="fc_account_message_password"></p>
                    <!-- <label class="control-label" for="customer_password">{{ lang.checkout_password|raw }}</label> -->
                    <input type="password" value="{{ customer_password }}" autocomplete="off" class="form-control" id="customer_password" name="customer_password" placeholder="{{ lang.checkout_password|raw }}">
                    <label style="display:none;" class="help-block" for="customer_password">{{ lang.checkout_error_password|raw }}</label>
                </div>
                <div id="li_customer_password2" style="display:none;" class="form-group col-sm-12">
                    <!-- <label class="control-label" for="customer_password2">{{ lang.checkout_retype_password|raw }}</label> -->
                    <input type="password" value="{{ customer_password }}" autocomplete="off" class="form-control" onchange="FC.checkout.checkPasswords()" id="customer_password2" name="customer_password2" placeholder="{{ lang.checkout_retype_password|raw }}">
                    <label style="display:none;" class="help-block" for="customer_password2">{{ lang.checkout_error_retype_password|raw }}</label>
                </div>
                <div id="li_customer_email_password" class="form-group row text-right" style="display:none">
                    <label for="fc_email_password"><a id="fc_email_password" href="javascript:;" onclick="FC.checkout.emailPassword()">{{ lang.checkout_email_my_password|raw }}</a></label>
                </div>
                <div id="li_customer_new_password" class="form-group row text-right" style="display:none">
                    <label for="fc_new_password"><a id="fc_new_password" href="javascript:;" onclick="FC.checkout.newPassword()">{{ lang.checkout_change_my_password|raw }}</a></label>
                </div>
            </div>
            <input type="hidden" name="email_found" id="email_found" value="{{ email_found }}" />
            <a class="btn btn-block btn-default" id="fc_continue" href="#" onclick="FC.checkout.checkLogin();">{{ lang.checkout_continue|raw }}</a>
            <span class="clearfix">&nbsp;</span>
        </div><!-- .fc_inner -->
    </fieldset><!-- #fc_login_register -->
    <span class="clearfix">&nbsp;</span>
    </div><!-- #fc_login_register_container -->
    {% endblock login_register %}

</div>


    {% if not is_subscription_cancel %}
<div class="row">



<div class="col-md-7">
    <div id="fc_data_entry_container">
        <div id="fc_customer_info_container">

<div class="form-group">
    <legend>Gift Options</legend>

    <fieldset class="form-group">
        <div class="radio gift-toggle">
        <label>
          <input type="radio" name="Is_this_a_gift" id="1" value="Nope it is for me" tabindex=400 data-toggle="radio" checked>
          <p>This is for me</p>
        </label>
</div>
        <div class="radio gift-toggle">        
    <label>
          <input type="radio" name="Is_this_a_gift" data-toggle="radio" id="2" value="2">
          <p>This is a gift</p>
        </label>
    </div>
    </fieldset>
  <div class="fc_inner" id="gift_fields" style="display: none;">
      <fieldset>
        <div class="row">
              <div class="form-group col-sm-4">
                <input type="text" class="form-control" name="Recipients Name" id="recipients_name" placeholder="Recipients Name">
              </div>

              <div class="form-group col-sm-4">
                  <input type="text" class="form-control" name="Recipients Email" id="recipients_email" placeholder="Recipients Email">
            </div>

            <div class="form-group col-sm-4">
                 <select class="form-control" name="Occasion" value="Occasion" id="occasion">
                    <option value="Occasion">Occasion</option>
                    <option value="Birthday">Birthday</option>
                    <option value="Thank You">Thank You</option>
                    <option value="Anniversary">Anniversary</option>
                    <option value="Graduation">Graduation</option>
                    <option value="Congratulations">Congratulations</option>
                    <option value="Workplace">Workplace</option>
                    <option value="Get Well">Get Well</option>
                    <option value="Good Luck">Good Luck</option>
                    <option value="Other">Other</option>
                  </select>
            </div>

        </div>

          
      <div class="row">
        <div class="form-group col-sm-12">
          <textarea rows="3" placeholder="Message for Recipient" name="Gift Message" id="gift_message" class="col-xs-12 form-control"></textarea>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-4">
          <input type="text" class="form-control col-md-4" name="Your Name" id="your_name" placeholder="Your Name">
        </div>
      </div>
        </fieldset>

</div>
</div>


            <!--  *********** customer_billing : Billing Address ************* -->
            {% block customer_billing %}
 <div class="form-group">
<!--                  <h2>{{ lang.checkout_customer_address|raw }}</h2>
 -->                <fieldset id="fc_customer_address">
                    <legend>Shipping Address</legend>
                    <div class="fc_inner">
                        <div>
                            <div class="row">
                                <!-- <label class="control-label" for="customer_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label> -->
                                <input type="hidden" class="hide" id="customer_country" name="customer_country" value="United States of America">
                                <input text="hidden" class="hide"  id="customer_country_name" name="customer_country_name" value="United States of America">
                                <label style="display:none;" class="help-block" for="customer_country_name">{{ lang.checkout_error_country|raw }}</label>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <!-- <label class="control-label" for="customer_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ customer_first_name }}" class="form-control" id="customer_first_name" name="customer_first_name" autocomplete="shipping given-name" placeholder="{{ lang.checkout_first_name|raw }}">
                                    <label style="display:none;" class="help-block" for="customer_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                </div>
                                <div class="form-group col-sm-6">
                                    <!-- <label class="control-label" for="customer_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="hidden" value="customer_last_name" class="form-control" id="customer_last_name" name="customer_last_name" autocomplete="shipping family-name">
                                    <label style="display:none;" class="help-block" for="customer_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-9">
                                    <!-- <label class="control-label" for="customer_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ customer_address1 }}" class="form-control" id="customer_address1" name="customer_address1" autocomplete="shipping address-line1" placeholder="{{ lang.checkout_address1|raw }}">
                                    <label style="display:none;" class="help-block" for="customer_address1">{{ lang.checkout_error_address1|raw }}</label>
                                </div>
                                <div class="fc_customer_address2 form-group col-sm-3">
                                    <!-- <label class="control-label" for="customer_address2">{{ lang.checkout_address2|raw }}</label> -->
                                    <input type="text" value="{{ customer_address2 }}" class="form-control " id="customer_address2" name="customer_address2" autocomplete="shipping address-line2" placeholder="{{ lang.checkout_address2|raw }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <!-- <label class="control-label" for="customer_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ customer_city }}" class="form-control" id="customer_city" name="customer_city" autocomplete="shipping locality" placeholder="{{ lang.checkout_city|raw }}">
                                    <label style="display:none;" class="help-block" for="customer_city">{{ lang.checkout_error_city|raw }}</label>
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="text" value="{{ customer_region_code }}" class="form-control" id="customer_state_name" name="customer_state_name" autocomplete="shipping region" placeholder="{{ lang.checkout_state|raw }}">
                                    <label style="display:none;" class="help-block" for="customer_state_name">{{ lang.checkout_error_state|raw }}</label>
                                </div>
                                    <div class="fc_customer_postal_code form-group col-sm-3">
                                    <!-- <label class="control-label" for="customer_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ customer_postal_code }}" class="form-control form-control_short" id="customer_postal_code" name="customer_postal_code" autocomplete="shipping postal-code" placeholder="{{ lang.checkout_postal_code|raw }}">
                                    <label style="display:none;" class="help-block" for="customer_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                    <label style="display:none;" class="help-block" for="customer_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-sm-12">
                                <textarea class="form-control" rows="3" placeholder="Is there anything else we need to know before we ship your order?"></textarea>
                                </div>
                            </div>

                            <div class="row text-center">
                                <small>We ship orders on the 1st Monday of every month</small>
                            </div>
                        </div>
                        <!-- <div id="fc_copy_billing_address">
                            <p><a href='#' onclick='FC.checkout.copyBillingToShipping(); return false;'>{{ lang.checkout_copy_billing_address_to_shipping|raw }}</a></p>
                        </div> -->
                        <span class="clearfix">&nbsp;</span>
                    </div><!-- .fc_inner -->
                </fieldset><!-- #fc_address_shipping -->
                <span class="clearfix">&nbsp;</span>
            </div>
        {% endblock customer_billing %}



        {% if not has_multiship %}







            {% block customer_shipping %}
            <!--  *********** address_shipping : Shipping Address ************* -->
            <div class="form-group hide">
<!--                  <h2>{{ lang.checkout_shipping_address|raw }}</h2>
 -->                <fieldset id="fc_shipping_address">
                    <legend>{{ lang.checkout_shipping_address|raw }}</legend>
                    <div class="fc_inner">
                        <div>
                            <div class="row">
                                <!-- <label class="control-label" for="shipping_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label> -->
                                <input type="hidden" class="hide" id="shipping_country" name="shipping_country" value="United States of America">
                                <input text="hidden" class="hide"  id="shipping_country_name" name="shipping_country_name" value="United States of America">
                                <label style="display:none;" class="help-block" for="shipping_country_name">{{ lang.checkout_error_country|raw }}</label>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <!-- <label class="control-label" for="shipping_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_first_name }}" class="form-control" id="shipping_first_name" name="shipping_first_name" autocomplete="shipping given-name" placeholder="{{ lang.checkout_first_name|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                </div>
                                <div class="form-group col-sm-6">
                                    <!-- <label class="control-label" for="shipping_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="hidden" value="shipping_last_name" class="form-control" id="shipping_last_name" name="shipping_last_name" autocomplete="shipping family-name">
                                    <label style="display:none;" class="help-block" for="shipping_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-9">
                                    <!-- <label class="control-label" for="shipping_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_address1 }}" class="form-control" id="shipping_address1" name="shipping_address1" autocomplete="shipping address-line1" placeholder="{{ lang.checkout_address1|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_address1">{{ lang.checkout_error_address1|raw }}</label>
                                </div>
                                <div class="fc_shipping_address2 form-group col-sm-3">
                                    <!-- <label class="control-label" for="shipping_address2">{{ lang.checkout_address2|raw }}</label> -->
                                    <input type="text" value="{{ shipping_address2 }}" class="form-control " id="shipping_address2" name="shipping_address2" autocomplete="shipping address-line2" placeholder="{{ lang.checkout_address2|raw }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <!-- <label class="control-label" for="shipping_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_city }}" class="form-control" id="shipping_city" name="shipping_city" autocomplete="shipping locality" placeholder="{{ lang.checkout_city|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_city">{{ lang.checkout_error_city|raw }}</label>
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="text" value="{{ shipping_region_code }}" class="form-control" id="shipping_state_name" name="shipping_state_name" autocomplete="shipping region" placeholder="{{ lang.checkout_state|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_state_name">{{ lang.checkout_error_state|raw }}</label>
                                </div>
                                    <div class="fc_shipping_postal_code form-group col-sm-3">
                                    <!-- <label class="control-label" for="shipping_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_postal_code }}" class="form-control form-control_short" id="shipping_postal_code" name="shipping_postal_code" autocomplete="shipping postal-code" placeholder="{{ lang.checkout_postal_code|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                    <label style="display:none;" class="help-block" for="shipping_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-sm-12">
                                <textarea class="form-control" rows="3" placeholder="Is there anything else we need to know before we ship your order?"></textarea>
                                </div>
                            </div>

                            <div class="row text-center">
                                <small>We ship orders on the 1st Monday of every month</small>
                            </div>
                        </div>
                        <!-- <div id="fc_copy_billing_address">
                            <p><a href='#' onclick='FC.checkout.copyBillingToShipping(); return false;'>{{ lang.checkout_copy_billing_address_to_shipping|raw }}</a></p>
                        </div> -->
                        <span class="clearfix">&nbsp;</span>
                    </div><!-- .fc_inner -->
                </fieldset><!-- #fc_address_shipping -->
                <span class="clearfix">&nbsp;</span>
            </div>
            {% endblock customer_shipping %}



        {% else %}{# If the store has multiship enabled #}



            {% block multiship_shipping %}
            <!--  *********** fc_shipto_# : Ship To: ************* -->
            <div id="fc_address_multiship_container">
            {% for multiship in multiship_data %}
                <div class="form-group" id="fc_shipto_{{ multiship.number }}_container">
<!--                     <h2>{{ lang.checkout_shipto|raw }} <span class="fc_shipto_name">{{ multiship.address_name }}</span></h2>
 -->                    <fieldset id="fc_shipto_{{ multiship.number }}">
                        <legend>{{ lang.checkout_shipto|raw }} <span class="fc_shipto_name">{{ multiship.address_name }}</span></legend>
                        <div style="display:none;" class="fc_inner fc_shipto_display" id="fc_shipto_{{ multiship.number }}_display"></div>
                        <div class="fc_inner fc_shipto_entry" id="fc_shipto_{{ multiship.number }}_entry">
                            <div id="fc_shipto_{{ multiship.number }}_list">
                                <div id="li_shipto_{{ multiship.number }}_select" class="li_shipping_select">
                                    <label for="shipto_{{ multiship.number }}_select" class="control-label">{{ lang.checkout_multiship_use_address|raw }}</label>
                                    <select id="shipto_{{ multiship.number }}_select" name="shipto_{{ multiship.number }}_select" onchange="FC.checkout.selectAddress({{ multiship.number }},this)">
                                    <option value="" selected="selected">{{ lang.checkout_multiship_new_address|raw }}</option>
                                    <option value="-1">{{ lang.checkout_multiship_use_billing_address|raw }}</option>
                                    </select>
                                </div>
                                <div class="form-control_select fc_foxycomplete fc_shipto_{{ multiship.number }}_country_name">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label>
                                    <select class="form-control  fc_required fc_location" data-default-value="" id="shipto_{{ multiship.number }}_country" name="shipto_{{ multiship.number }}_country">
                                    {{ multiship.country_options|raw }}
                                    </select>
                                    <input value="{{ (multiship.country_code == '') ? multiship.country_name : multiship.country_code }}" type="text" style="display:none;" class="fc_foxycomplete_input form-control  fc_required fc_location" id="shipto_{{ multiship.number }}_country_name" name="shipto_{{ multiship.number }}_country_name">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_country_name">{{ lang.checkout_error_country|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_first_name">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.first_name }}" class="form-control  fc_required" id="shipto_{{ multiship.number }}_first_name" name="shipto_{{ multiship.number }}_first_name" autocomplete="section-{{ multiship.number }} shipping given-name">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_last_name">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.last_name }}" class="form-control  fc_required" id="shipto_{{ multiship.number }}_last_name" name="shipto_{{ multiship.number }}_last_name" autocomplete="section-{{ multiship.number }} shipping family-name">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_company">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_company">{{ lang.checkout_company|raw }}</label>
                                    <input type="text" value="{{ multiship.company }}" class="form-control " id="shipto_{{ multiship.number }}_company" name="shipto_{{ multiship.number }}_company" autocomplete="section-{{ multiship.number }} shipping organization">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_company">{{ lang.checkout_error_company|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_address1">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.address1 }}" class="form-control  fc_required" id="shipto_{{ multiship.number }}_address1" name="shipto_{{ multiship.number }}_address1" autocomplete="section-{{ multiship.number }} shipping address-line1">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_address1">{{ lang.checkout_error_address1|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_address2">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_address2">{{ lang.checkout_address2|raw }}</label>
                                    <input type="text" value="{{ multiship.address2 }}" class="form-control " id="shipto_{{ multiship.number }}_address2" name="shipto_{{ multiship.number }}_address2" autocomplete="section-{{ multiship.number }} shipping address-line2">
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_city">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.city }}" class="form-control  fc_required" id="shipto_{{ multiship.number }}_city" name="shipto_{{ multiship.number }}_city" autocomplete="section-{{ multiship.number }} shipping locality">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_city">{{ lang.checkout_error_city|raw }}</label>
                                </div>
                                <div class="form-control_select fc_foxycomplete fc_shipto_{{ multiship.number }}_state_name">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_state_name">{{ lang.checkout_state|raw }}<span class="fc_ast">*</span></label>
                                    <select class="form-control  fc_required fc_location" data-default-value="{{ multiship.region_code }}" id="shipto_{{ multiship.number }}_state" name="shipto_{{ multiship.number }}_state" style="display: none;">
                                    {{ multiship.region_options|raw }}
                                    </select>
                                    <input value="{{ (multiship.region_code == '') ? multiship.region_name : multiship.region_code }}" type="text" class="fc_foxycomplete_input form-control  fc_required fc_location" id="shipto_{{ multiship.number }}_state_name" name="shipto_{{ multiship.number }}_state_name">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_state_name">{{ lang.checkout_error_state|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_postal_code">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.postal_code }}" class="form-control form-control_short fc_required" id="shipto_{{ multiship.number }}_postal_code" name="shipto_{{ multiship.number }}_postal_code" autocomplete="section-{{ multiship.number }} shipping postal-code">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                    <label style="display:none;" class="alert alert-warning alert alert-warning_invalid_postal_code" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                </div>
                            </div></div>
                            <div{% if multiship_data|length == 1 %} style="display:none;"{% endif %} class="fc_shipto_subtotal">
                                <div class="fc_shipto_{{ multiship.number }}_subtotal">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_subtotal">{{ lang.checkout_shipment_subtotal|raw }}</label>
                                    <span id="shipto_{{ multiship.number }}_subtotal_formatted">{{ multiship.checkout_sub_total|money_format }}</span>
                                    <input type="hidden" value="{{ multiship.checkout_sub_total }}" id="shipto_{{ multiship.number }}_subtotal" name="shipto_{{ multiship.number }}_subtotal" />
                                </div>
                            {% if multiship.has_shipping_or_handling_cost %}
                                <div class="fc_shipto_{{ multiship.number }}_shipping_total">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_shipping_total">{{ multiship.shipping_and_handling_label|raw }}</label>
                                    <span id="shipto_{{ multiship.number }}_shipping_total_formatted">{{ multiship.shipping_total|money_format }}</span>
                                    <input type="hidden" value="{{ multiship.shipping_total }}" class="fc_shipping" id="shipto_{{ multiship.number }}_shipping_total" name="shipto_{{ multiship.number }}_shipping_total" />
                                </div>
                            {% else %}
                                <input type="hidden" name="shipto_{{ multiship.number }}_shipping_total" id="shipto_{{ multiship.number }}_shipping_total" class="fc_shipping" value="0" />
                            {% endif %}
                                <div class="fc_shipto_{{ multiship.number }}_tax_total">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_tax_total">{{ lang.checkout_shipment_tax|raw }}</label>
                                    <span id="shipto_{{ multiship.number }}_tax_total_formatted">{{ multiship.checkout_tax_total|money_format }}</span>
                                    <input type="hidden" value="{{ multiship.checkout_tax_total }}" class="fc_taxes" id="shipto_{{ multiship.number }}_tax_total" name="shipto_{{ multiship.number }}_tax_total" />
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_total">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_total">{{ lang.checkout_shipment_total|raw }}</label>
                                    <span id="shipto_{{ multiship.number }}_total_formatted">{{ multiship.total|money_format }}</span>
                                    <input type="hidden" value="{{ multiship.total }}" id="shipto_{{ multiship.number }}_total" name="shipto_{{ multiship.number }}_total">
                                </div>
                            </div>
                            ^^multiship_custom_fields_{{ multiship.number }}^^
                            {% if multiship.has_live_rate_shippable_products %}
                                <div class="fc_shipping_methods_container">
                                    <label for="fc_shipto_{{ multiship.number }}_shipping_methods" class="control-label fc_shipping_methods">{{ lang.checkout_shipping_methods|raw }}</label>
                                    <div id="fc_shipto_{{ multiship.number }}_shipping_methods" class="form-control_group_container fc_shipping_methods">
                                        <div id="fc_shipto_{{ multiship.number }}_shipping_result" class="fc_shipping_result">{{ lang.checkout_update_shipping_message|raw }}</div>
                                        <span id="shipto_{{ multiship.number }}_shipping_ajax" class="fc_shipping_ajax" style="display:none">{{ lang.checkout_updating_shipping_options|raw }}<img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" /></span>
                                        <textarea rows="1" cols="1" name="shipto_{{ multiship.number }}_shipping_options" id="shipto_{{ multiship.number }}_shipping_options" style="display:none;">{{ multiship.shipping_options }}</textarea>
                                        <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_id" id="shipto_{{ multiship.number }}_shipping_service_id" value="{{ multiship.shipping_service_id }}" />
                                        <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_description" id="shipto_{{ multiship.number }}_shipping_service_description" value="{{ multiship.shipping_service_description }}" />
                                        <div id="fc_shipto_{{ multiship.number }}_shipping_methods_inner" class="fc_shipping_methods_inner">
                                        {{ multiship.shipping_options_html|raw }}
                                        </div>
                                        <label for="fc_shipto_{{ multiship.number }}_shipping_methods" class="alert alert-warning" style="display:none">{{ lang.checkout_select_shipping_option|raw }}</label>
                                    </div>
                                </div>
                            {% else %}
                                <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_description" id="shipto_{{ multiship.number }}_shipping_service_description" value="{{ lang.checkout_flat_rate_shipping|raw }}" />
                                <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_id" id="shipto_{{ multiship.number }}_shipping_service_id" value="-1" />
                            {% endif %}
                            {% if has_downloadables %}
                                <div class="fc_downloadable_message_container">
                                    <p class="fc_downloadable_message">{{ lang.checkout_downloadables_message|raw }}</p>
                                </div>
                            {% endif %}
                            <span class="clearfix">&nbsp;</span>
                        </div><!-- .fc_inner -->
                        <div class="fc_shipto_actions">
                            <a class="fc_shipto_shipto_set" id="fc_shipto_{{ multiship.number }}_shipto_set" href="javascript:;">{{ lang.checkout_confirm_address|raw }}</a>
                            <a class="fc_shipto_shipto_edit" id="fc_shipto_{{ multiship.number }}_shipto_edit" href="javascript:;">{{ lang.checkout_edit_address|raw }}</a>
                        </div>
                    </fieldset><!-- #fc_shipto_{{ multiship.number }} -->
                <span class="clearfix">&nbsp;</span>
                </div>
                <input type="hidden" value="{{ multiship.address_name }}" class="fc_shipto_address_name" id="shipto_{{ multiship.number }}_address_name" name="shipto_{{ multiship.number }}_address_name">
            {% endfor %}
            </div>
            {% endblock multiship_shipping %}



        {% endif %}{# End the has_multiship check #}
        </div><!-- #fc_customer_info_container -->

        {# This place holder is here for backward compatibility so that custom fields will be injected into the correct place. #}
        ^^custom_fields^^
</div><!-- end of shipping info -->

    {% block checkout_payment %}
        <!--  *********** payment : Payment Information ************* -->
        <div id="fc_payment_container" class="form-group ">
<!--             <h2>{{ lang.checkout_payment_information|raw }}</h2>
 -->            <fieldset id="fc_payment">
                <legend>{{ lang.checkout_payment_information|raw }}</legend>
                <small class="text-center">Your payment is secure with us.  We use <a href="http://www.foxycart.com/features/feature/security" target="_blank">Foxycart</a> to ensure that all information is encrypet at all times</small>
                <div class="fc_inner">
                    <div id="fc_payment_list">
                    {% if supports_pay_with_plastic %}
                        <div id="fc_payment_method_plastic_container">
                            <label for="fc_payment_method_plastic">
                                <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'plastic' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_plastic" value="plastic" autocomplete="off" />
                                <span class="text-center">{{ lang.checkout_pay_with_credit_card|raw }}</span>
                            </label>
                        {% if has_multiple_payment_options %}
                            <fieldset>
                                <div>
                        {% else %}
                            </div>
                        {% endif %}{# has_multiple_payment_options #}
                                 <div class="form-group">
                                    <div id="li_cc_saved" class="radio">
                                        <label for="c_card_saved">
                                            <input{% if cc_card_is_saved %} checked="checked"{% endif %}  type="radio" name="c_card" value="saved" id="c_card_saved" onclick="FC.checkout.displayNewCC(0)" autocomplete="off" />
                                            <span>{{ lang.checkout_use_saved_payment_info|raw }}</span>
                                            <span id="fc_c_card_saved_number">{{ checkout_cc_number_masked }}</span>
                                        </label>
                                    </div>
                                    <div id="li_cc_new" class="radio">
                                        <label for="c_card_new">
                                            <input{% if not cc_card_is_saved %} checked="checked"{% endif %}  type="radio" name="c_card" value="new" id="c_card_new" onclick="FC.checkout.displayNewCC(1)" autocomplete="off" />
                                            <span>{{ lang.checkout_enter_new_card|raw }}</span>
                                        </label>
                                    </div>
                                </div>


                                    <div class="row">
                                        <div id="li_cc_number" class="li_cc_number form-group col-sm-10">
                                            <!-- <label for="cc_number" class="control-label">{{ lang.checkout_card_number|raw }}</label> -->
                                            <input type="text" name="cc_number" id="cc_number" class="form-control col-sm-10 fc_required" autocomplete="off" value="{{ cc_number }}" placeholder="{{ lang.checkout_card_number|raw }}" />
                                            <label for="cc_number" class="alert alert-warning" style="display:none">{{ lang.checkout_error_card_number|raw }}</label>
                                        </div>
                                        <div id="li_cc_cvv2" class="li_cc_cvv2 form-group col-sm-2">
                                            <!-- <label for="cc_cvv2" class="control-label">
                                                {{ lang.checkout_verification_code|raw }}
                                                <span id="fc_help_cvv2" class="fc_help">(<a id="fc_help_cvv2_link" class="fc_help fc_jTip" href="https://{{ store_domain }}{{ base_directory }}/checkout.help.php?topic=cvv2&amp;width=308">{{ lang.checkout_question_mark|raw }}</a>)</span>
                                            </label> -->
                                            <input value="{{ cc_cvv2 }}" type="text" name="cc_cvv2" id="cc_cvv2" autocomplete="off" class="form-control fc_required" maxlength="4" placeholder="CVV" />
                                            <label for="cc_cvv2" class="alert alert-warning" style="display:none">{{ lang.checkout_error_verification_code|raw }}</label>
                                        </div>
                                        <div id="li_cc_issue_number" class="col-sm-2 form-group">
                                            <!-- <label for="cc_issue_number" class="control-label">{{ lang.checkout_issue_number|raw }}</label> -->
                                            <input value="{{ cc_issue_number }}" type="text" name="cc_issue_number" id="cc_issue_number" class="form-control fc_required" maxlength="2" placeholder="{{ lang.checkout_issue_number|raw }}"/>
                                            <label for="cc_issue_number" class="alert alert-warning" style="display:none">{{ lang.checkout_error_issue_number|raw }}</label>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <!-- <div id="li_cc_start_date_month">
                                            <label for="cc_start_date_month" class="control-label">{{ lang.checkout_start_date|raw }}</label>
                                            <select id="cc_start_date_month" name="cc_start_date_month" class="col-sm-1">
                                                <option value="">{{ lang.cart_month|raw }}</option>
                                                {{ cc_start_date_month_options|raw }}
                                            </select>
                                            <input type="text" class="form-control col-sm-1" id="cc_start_date_month" name="cc_start_date_month" placeholder="{{ lang.checkout_start_date|raw }}">
                                            <input type="text" class="form-control col-sm-1"  id="cc_start_date_year" name="cc_start_date_year" placeholder="{{ lang.cart_year|raw }}">
                                            
                                            <select id="cc_start_date_year" name="cc_start_date_year" class="col-sm-1">
                                                <option value="">{{ lang.cart_year|raw }}</option>
                                                {{ cc_start_date_year_options|raw }}
                                            </select>
                                            <label for="cc_start_date_month" class="alert alert-warning" style="display:none">{{ lang.checkout_error_start_date|raw }}</label>
                                        </div> -->



                                   <!--  <div id="li_cc_start_date_month">
                                        <label for="cc_start_date_month" class="control-label">{{ lang.checkout_start_date|raw }}</label>
                                        <input type="text"  class="col-sm-2 form-control " id="cc_start_date_month" name="cc_start_date_month" placeholder="{{ lang.cart_month|raw }}">
                                            <option value="">{{ lang.cart_month|raw }}</option>
                                            {{ cc_start_date_month_options|raw }}
                                        </input>
                                        <input type="text" class="col-sm-2 form-control " id="cc_start_date_year" name="cc_start_date_year" placeholder="{{ lang.cart_year|raw }}">
                                            <option value="">{{ lang.cart_year|raw }}</option>
                                            {{ cc_start_date_year_options|raw }}
                                        </input>
                                        <label for="cc_start_date_month" class="alert alert-warning" style="display:none">{{ lang.checkout_error_start_date|raw }}</label>
                                    </div> -->
                                    <div id="li_cc_exp_month" class="col-sm-3 form-group">
                                        <!-- <label for="cc_exp_month" class="control-label">{{ lang.checkout_expiration|raw }}</label> -->
                                        <input type="text" class="form-control"  id="cc_exp_month" name="cc_exp_month" placeholder="MM">
                                            <!-- <option value="">{{ lang.cart_month|raw }}</option>
                                            {{ cc_expiration_month_options|raw }} -->
                                        </input>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <input type="text" class="form-control " id="cc_exp_year" name="cc_exp_year" placeholder="YY">
                                           <!--  <option value="">{{ lang.cart_year|raw }}</option>
                                            {{ cc_expiration_year_options|raw }} -->
                                        </input>
                                        <label for="cc_exp_month" class="alert alert-warning" style="display:none">{{ lang.checkout_error_expiration|raw }}</label>
                                    </div>

                                        <div class="col-sm-3 form-group">
                                            <!-- <label class="fc_pre" for="customer_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label> -->
                                            <input type="text"  class="form-control fc_required" id="customer_postal_code" name="customer_postal_code" autocomplete="billing postal-code" placeholder="ZIP">
                                            <label style="display:none;" class="alert alert-warning" for="customer_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                            <label style="display:none;" class="alert alert-warning fc_error_invalid_postal_code" for="customer_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                        </div> 

                                    </div>

                                    <div class="checkbox checkbox-container" id="li_save_cc">
                                        <label>
                                            <input type="checkbox" name="save_cc" id="save_cc" value="1" checked="checked" checked>{{ save_cc_text }}
                                        <label for="save_cc" class="alert alert-warning" style="display:none">{{ lang.checkout_error_subscription_permission|raw }}</label>
                                        </label>
                                        <input type="hidden" name="cc_number_masked" id="cc_number_masked" value="{{ checkout_cc_number_masked }}" />
                                    </div>

                                    <div class="checkbox checkbox-container" id="li_save_cc">
                                        <label>
                                            <input type="checkbox" name="Subscribe" value="yes" checked="checked" checked>Sign up for our awesome newsletter (don't worry we won't spam you)
                                        </label>
                                    </div>



                        {% if has_multiple_payment_options %}
                                </div>
                            </fieldset>
                        </div>
                        {% endif %}{# has_multiple_payment_options #}
                    {% endif %}{# supports_pay_with_plastic #}

                    {% if supports_paypal_express and not is_updateinfo %}
                        <div id="fc_payment_method_paypal_container">
                        {% if has_multiple_payment_options %}
                            <label for="fc_payment_method_paypal">
                                <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'paypal' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_paypal" class="form-control" value="paypal" autocomplete="off" />
                                <span>{{ lang.checkout_pay_with_paypal|raw }}</span>
                            </label>
                        {% else %}
                            <input type="hidden" name="fc_payment_method" id="fc_payment_method" value="paypal" />
                            <span>{{ lang.checkout_pay_with_paypal|raw }}</span>
                        {% endif %}
                            <fieldset>
                                <p>{{ paypal_description|raw }}</p>
                            </fieldset>
                        </div>
                    {% endif %}{# supports_paypal_express and not is_updateinfo #}

                    {% if not is_updateinfo %}
                    {% for hosted_gateway in hosted_payment_gateways %}
                        <div id="fc_payment_method_{{ hosted_gateway.type }}_container">
                        {% if has_multiple_payment_options %}
                            <label class="form-control">
                                <input type="{{ payment_method_input_type }}"{% if payment_method_type == hosted_gateway.type %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_{{ hosted_gateway.type }}" value="{{ hosted_gateway.type }}" autocomplete="off" />
                                <span>{{ hosted_gateway.lang_pay_with|raw }}</span>
                            </label>
                        {% else %}
                            <input type="hidden" name="fc_payment_method" id="fc_payment_method_{{ hosted_gateway.type }}" value="{{ hosted_gateway.type }}" />
                            <span>{{ hosted_gateway.lang_pay_with|raw }}</span>
                        {% endif %}
                            <fieldset>
                                <p>{{ hosted_gateway.lang_payment_method|raw }}</p>
                            </fieldset>
                        </div>
                    {% endfor %}
                    {% endif %}{# not is_updateinfo #}

                    {% if supports_purchase_order and not is_updateinfo %}
                        <div id="fc_payment_method_purchase_order_container">
                            <label for="fc_payment_method_purchase_order">
                                <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'purchase_order' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_purchase_order" value="purchase_order" autocomplete="off" />
                                <span>{{ lang.checkout_pay_with_purchase_order|raw }}</span>
                            </label>
                        {% if has_multiple_payment_options %}
                            <fieldset>
                                <div>
                        {% else %}
                        </div>
                        {% endif %}{# has_multiple_payment_options #}
                                    <div id="li_purchase_order" class="li_purchase_order">
                                        <label for="purchase_order">
                                            {{ lang.checkout_purchase_order_number|raw }}
                                        </label>
                                        <input value="{{ purchase_order }}" type="text" name="purchase_order" id="purchase_order" class="form-control fc_required" />
                                        <label for="purchase_order" class="alert alert-warning" style="display:none">{{ lang.checkout_error_purchase_order|raw }}</label>
                                    </div>
                        {% if has_multiple_payment_options %}
                                </div>
                            </fieldset>
                        </div>
                        {% endif %}{# has_multiple_payment_options #}
                    {% endif %}{# supports_purchase_order and not is_updateinfo #}

                        <div id="li_nopayment">
                            {# This is used for $0 transactions and other situations where no payment info is collected #}
                            {{ lang.checkout_no_payment_needed|raw }}
                        </div>
                    </div>

                    <div id="fc_complete_order_button_container" class="center">
                        <button id="fc_complete_order_button" class="btn btn-primary btn-lg fc_button{{ submit_button_class }}" type="button" value="Sign Up!" onclick="FC.checkout.validateAndSubmit()">Sign Up!</button>
                        <div id="fc_complete_order_processing" style="display:none;"><strong class="alert alert-warning"></strong> <br /><img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" width="220" height="19" /></div>
                    </div><!-- #fc_complete_order_button_container -->

                </div><!-- .fc_inner -->
            </fieldset><!-- #fc_payment -->
            <span class="clearfix">&nbsp;</span>
        </div><!-- #fc_payment_container -->
    {% endblock checkout_payment %}
</div>


<div class="col-md-4 col-sm-offset-1 shaded-form">

    {# BEGIN CART TWIG TEMPLATE #}

{% block cart %}

{% block cart_begin %}

{% if not for_email %}
<!-- begin cart output -->
<div id="fc_cart_container"><div id="fc_cart_container_inner">
{% endif %}
{% if with_controls %}
<noscript>
    <div id="fc_error_noscript" class="fc_error">
        <h3>{{ lang.cart_warning|raw }}:</h3>
        <p>{{ lang.cart_no_javascript_message|raw }}</p>
    </div><!-- #fc_errorNoScript -->
</noscript>
<form id="fc_cart_form" action="https://{{ store_domain }}{{ post_url }}" method="post">
    <div id="fc_cart_controls_top" class="fc_cart_controls">
    {% block cart_controls %}
        <input type="hidden" name="cart" value="update" />
        <input type="hidden" name="item_count" value="{{ items|length }}" />
        <input type="hidden" name="{{ session_name }}" value="{{ session_id }}" />
    {% if supports_paypal_express or show_amazon_fps_button %}
        <a class="fc_link_nav fc_cart_update fc_cart_update_paypal" href="#" onclick="fc_UpdateCart();return false;">{{ lang.cart_update_cart|raw }}</a>
    {% else %}
        <a class="fc_link_nav fc_cart_update" href="#" onclick="fc_UpdateCart();return false;">{{ lang.cart_update_cart|raw }}</a>
    {% endif %}
    {% if items|length > 0 %}
        {% if supports_paypal_express and show_amazon_fps_button %}
        <div class="fc_cart_alternate_payments">
        {% endif %}
        {% if supports_paypal_express %}
        <a class="fc_link_nav fc_link_forward fc_cart_checkout_paypal" href="https://{{ store_domain }}/checkout.php?ThisAction=paypal_express&{{ session_name }}={{ session_id }}" target="_top">
            <img src="{{ paypal_checkout_button_url }}" />
        </a>
        {% endif %}
        {% if show_amazon_fps_button %}
        <a class="fc_link_nav fc_link_forward fc_cart_checkout_paypal fc_cart_checkout_amazon" href="https://{{ store_domain }}/checkout.php?ThisAction=checkout&fc_payment_method=amazon_fps" target="_top">
            <img src="https://cdn.foxycart.com/static/images/payment_logos/amazon.png" />
        </a>
        {% endif %}
        {% if supports_paypal_express and show_amazon_fps_button %}
        </div>
        {% endif %}
        {% if supports_paypal_express or show_amazon_fps_button %}
        <span class="fc_cart_checkout_or">-OR-</span>
        {% endif %}
        <a class="fc_link_nav fc_link_forward fc_cart_checkout" href="https://{{ store_domain }}/checkout.php?{{ session_name }}={{ session_id }}" target="_top">{{ lang.cart_checkout|raw }}</a>
    {% endif %}
    {% endblock cart_controls %}
    </div><!-- #fc_cart_controls_top -->
{% endif %}
{% if with_controls %}
    {{ html_messages|raw }}
{% endif %}
{% if for_email %}
    <table id="fc_cart_table" width="100%" style="font-size:12px; text-align:left;" cellspacing="0" cellpadding="5">
{% else %}
    <table id="fc_cart_table" cellspacing="0" cellpadding="0">
{% endif %}
        <caption>{{ lang.cart_caption|raw }}</caption>

{% endblock cart_begin %}

{% block header %}

{% if not for_email %}
        <thead>
{% endif %}
            <tr id="fc_cart_head">
            {% if has_product_images %}
                <th{{ css_styles.background }} id="fc_cart_head_image"><span>{{ lang.cart_image|raw }}</span></th>
            {% endif %}
                <th{{ css_styles.background }} id="fc_cart_head_item"><span>{{ lang.cart_item|raw }}</span></th>
            </tr>
{% if not for_email %}
        </thead>
{% endif %}

{% endblock header %}

{% block footer %}

    {% if not for_email %}
        <tfoot>
    {% endif %}
            <tr id="fc_cart_foot_subtotal">
                <td{{ css_styles.border2_right }} class="fc_col1" colspan="{{ colspan-1 }}" >{{ lang.cart_subtotal|raw }}:</td>
                <td{{ css_styles.border2 }} class="fc_col2">{{ cart_sub_total }}</td>
            </tr>
        {% if has_future_products %}
            <tr id="fc_cart_foot_subscriptions">
                <td class="fc_col1" colspan="{{ colspan-1 }}">{{ lang.cart_future_subscriptions|raw }}:</td>
                <td{{ css_styles.right }} class="fc_col2">{{ future_total_price }}</td>
            </tr>
        {% endif %}
    {% for coupon in coupons %}
        {% if not coupon.is_applied %}
            <tr class="fc_cart_foot_discount fc_coupon_unapplied">
        {% else %}
            <tr class="fc_cart_foot_discount">
        {% endif %}
                <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">
                    {{ coupon.name }}: {{ coupon.code }}
                </td>
                <td class="fc_col2">
                    <span class="fc_discount">{{ coupon.amount }}</span>
                {% if with_controls %}
                    <span class="fc_cart_coupon_remove">
                        <a href="https://{{ store_domain }}{{ post_url }}?cart=remove_coupon&amp;coupon_code_id={{ coupon.id }}&amp;{{ session_name }}={{ session_id }}" class="fc_cart_remove_link" title="{{ lang.cart_remove_coupon|raw }}">[x]</a>
                    </span>
                {% endif %}
                </td>
            </tr>
    {% endfor %}
    {% for coupon in future_coupons %}
        <tr class="fc_cart_foot_discount fc_future">
            <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">
                {{ lang.cart_future_subscriptions|raw }} {{ coupon.name }}: {{ coupon.code }}
            </td>
            <td class="fc_col2">
                <span class="fc_discount">{{ coupon.amount }}</span>
            </td>
        </tr>
    {% endfor %}

        {% if with_controls and has_eligible_coupons %}
            <tr id="fc_cart_foot_discount_new">
                <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">
                    <a href="#" onclick="fc_AddCoupon(); this.blur(); return false;">{{ lang.cart_add_coupon|raw }}</a>
                </td>
                <td class="fc_col2">
                    <input type="text" name="coupon" id="fc_coupon" class="fc_text fc_text_short" value="" style="display:none;" />
                </td>
            </tr>
        {% endif %}
{% if not with_controls %}
        {% if show_shipping_tbd %}
            <tr id="fc_cart_foot_shipping_tbd">
                <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ shipping_and_handling_label|raw }}:</td>
                <td class="fc_col2">{{ lang.checkout_tbd|raw }}</td>
            </tr>
        {% endif %}
        {% if show_shipping_tbd and hide_shipping_row %}
            <tr id="fc_cart_foot_shipping" style="display: none;">
        {% else %}
            <tr id="fc_cart_foot_shipping">
        {% endif %}
                <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ shipping_and_handling_label|raw }}:</td>
            {% if show_shipping_tbd %}
                <td class="fc_col2">{{ lang.checkout_tbd|raw }}</td>
            {% else %}
                <td class="fc_col2">{{ cart_total_shipping }}</td>
            {% endif %}
            </tr>
    {% if has_future_products %}
        {% if show_future_shipping_and_handling %}
            <tr id="fc_cart_foot_future_shipping">
        {% else %}
            <tr id="fc_cart_foot_future_shipping" style="display: none;">
        {% endif %}
                <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ lang.cart_future_subscriptions|raw }} {{ shipping_and_handling_label|raw }}:</td>
                <td class="fc_col2">{{ future_shipping_and_handling }}</td>
            </tr>
    {% endif %}
    {% if has_taxes %}
        {% for tax in taxes %}
            {% if tax.show_tax %}
                <tr id="fc_cart_foot_tax_{{ tax.id }}" class="fc_cart_foot_tax">
                    <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ tax.description|raw }}:</td>
                    <td class="fc_col2">{{ tax.amount }}</td>
                </tr>
            {% else %}
                {% if not for_email %}
                <tr id="fc_cart_foot_tax_{{ tax.id }}" class="fc_cart_foot_tax" style="display: none;">
                    <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ tax.description|raw }}:</td>
                    <td class="fc_col2">{{ tax.amount }}</td>
                </tr>
                {% endif %}
            {% endif %}
        {% endfor %}
        {% if show_tax_tbd %}
            {% if tax_total <= 0 %}
                <tr id="fc_cart_foot_tax_tbd">
            {% else %}
                <tr id="fc_cart_foot_tax_tbd" style="display: none;">
            {% endif %}
                    <td class="fc_col1" colspan="{{ colspan-1 }}">{{ lang.checkout_tax|raw }}:</td>
                    <td class="fc_col2">{{ lang.checkout_tbd|raw }}</td>
                </tr>
        {% endif %}
    {% endif %}
{% endif %}
            <tr id="fc_cart_foot_total">
                <td class="fc_col1" colspan="{{ colspan-1 }}">{{ lang.cart_order_total|raw }}:</td>
                <td class="fc_col2">{{ cart_order_total }}</td>
            </tr>
    {% if not for_email %}
        </tfoot>
    {% endif %}

{% endblock footer %}

{% block body %}

{% if not has_multiship and not for_email %}
    <tbody>
{% endif %}
{% for item in items %}
        {% if item.multiship >= 0 %}
        {% if item.multiship > 0 and not for_email %}
        </tbody>
        {% endif %}
    {% if not for_email %}
        <tbody class="fc_ship_to">
    {% endif %}
            <tr>
                <th id="fc_shipto_{{ item.multiship }}_cart_row" class="fc_shipto" colspan="{{ colspan }}">
                    {{ lang.cart_shipto|raw }}: {{ item.shipto }}
                </th>
            </tr>
    {% endif %}
        {% if item.item_number == items|length %}
            <tr id="product_{{ item.id }}" class="fc_cart_item fc_cart_item_last">
        {% else %}
            <tr id="product_{{ item.id }}" class="fc_cart_item">
        {% endif %}
            {% if has_product_images %}
                <td class="fc_cart_item_image"{{ css_styles.border }}>
                {% if item.image != '' %}
                {% if item.url != '' %}
                    <a href="{{ item.url }}" target="_top" alt="{{ item.alt_name }}">
                {% endif %}
                    <img class="fc_cart_thumbnail" src="{{ item.image }}" />
                {% if item.url != '' %}
                    </a>
                {% endif %}
                {% endif %}
                </td>
            {% endif %}
                <td class="fc_cart_item_details"{{ css_styles.border }}>
                    <span class="fc_cart_item_name">{{ item.name }}</span>
                {% if item.options|length > 0 or item.code != '' or item.category_code != 'DEFAULT' or item.weight != 0 or item.subscription_frequency != '' %}
                    <ul class="fc_cart_item_options">
                    {% for option in item.options %}
                        <li class="fc_cart_item_option fc_cart_item_{{ option.class }}">
                            <span class="fc_cart_item_option_name">{{ option.name }}</span><span class="fc_cart_item_option_separator">:</span>
                            <span class="fc_cart_item_option_value">{{ option.value }}</span>
                        </li>
                    {% endfor %}
                    {% if item.code != '' %}
                        <li class="fc_cart_item_option fc_cart_item_code">
                        {{ lang.cart_code|raw }}: {{ item.code }}
                        </li>
                    {% endif %}
                    {% if item.category_code != 'DEFAULT' %}
                        <li class="fc_cart_item_option fc_cart_category_code">
                        {{ lang.cart_category|raw }}: {{ item.category_code }}
                        </li>
                    {% endif %}
                    {% if item.weight != 0 %}
                        <li class="fc_cart_item_option fc_cart_item_weight">
                        {{ lang.cart_weight|raw }}: {{ item.weight }} <span class="fc_uom_weight">{{ weight_uom }}</span>
                        </li>
                    {% endif %}
                    {% if item.subscription_frequency != '' %}
                        <li class="fc_cart_item_option fc_cart_item_subscription_details">
                            {{ lang.cart_subscription_details|raw }}
                            <ul>
                                <li class="fc_cart_item_option fc_cart_item_sub_frequency">
                                    <span class="fc_cart_item_option_name">{{ lang.cart_frequency|raw }}</span><span class="fc_cart_item_option_separator">:</span> <span class="fc_cart_item_option_value">{{ item.subscription_frequency }}</span>
                                </li>
                                <li class="fc_cart_item_option fc_cart_item_sub_startdate">
                                    <span class="fc_cart_item_option_name">{{ lang.cart_start_date|raw }}</span><span class="fc_cart_item_option_separator">:</span> <span class="fc_cart_item_option_value">{{ item.subscription_start_date }}</span>
                                </li>
                            {% if item.subscription_end_date != "0000-00-00" %}
                                <li class="fc_cart_item_option fc_cart_item_sub_enddate">
                                    <span class="fc_cart_item_option_name">{{ lang.cart_end_date|raw }}</span><span class="fc_cart_item_option_separator">:</span> <span class="fc_cart_item_option_value">{{ item.subscription_end_date }}</span>
                                </li>
                            {% endif %}
                            </ul>
                        </li>
                    {% endif %}
                    </ul>
                {% endif %}
                {% if with_controls %}
                    <span class="fc_cart_remove_left">
                        <a href="#" onclick="fc_RemoveItem({{ item.item_number }}); return false;" class="fc_cart_remove_link" title="{{ lang.cart_remove_item|raw }}">[x]</a>
                    </span>
                    <input type="hidden" id="id{{ item.item_number }}" name="id{{ item.item_number }}" value="{{ item.id }}" />
                {% endif %}
                </td>
            </tr>
{% endfor %}
    {% if not for_email %}
        </tbody>
    {% endif %}
{% endblock body %}

{% block cart_end %}

{% if items|length == 0 %}
    {% if not for_email %}
        <tbody>
    {% endif %}
            <tr class="fc_cart_item">
                <td colspan="{{ colspan }}" id="fc_empty_cart">{{ lang.cart_empty|raw }}</td>
            </tr>
    {% if not for_email %}
        </tbody>
    {% endif %}
{% endif %}
    </table>
{% if with_controls %}
    <div id="fc_cart_controls_bottom" class="fc_cart_controls">
    {{ block('cart_controls') }}
    </div><!-- #fc_cart_controls_bottom -->
</form>
{% endif %}
{% if not for_email %}
</div></div><!-- #fc_cart_container_inner, #fc_cart_container -->
{% endif %}
<!-- end cart output -->

{% endblock cart_end %}

{% endblock cart %}

{# END CART TWIG TEMPLATE #}




                    </div>
                    <span class="clearfix">&nbsp;</span>
            </fieldset><!-- #fc_shipping -->
        </div><!-- #fc_shipping_container -->

</div>
   
</div><!-- End pricing container -->



</div><!-- end row of shipping, pricing and billing -->


    </div><!-- #fc_data_entry_container -->


    {% else %} {# is_subscription_cancel #}

<div class="col-md-8">

        {% block subscription_cancel %}
        <div id="fc_subscription_cancel_message">
            {{ lang.checkout_subscription_cancel_message|raw }}
        </div><!-- #fc_subscription_cancel_message -->

        <div id="fc_complete_order_button_container" class="form-control_actions center">
            <button id="fc_complete_order_button" class="btn btn-primary btn-lg fc_button{{ submit_button_class }}" type="button" value="{{ submit_button_value }}" onclick="FC.checkout.validateAndSubmit()">{{ submit_button_value }}</button>
            <div id="fc_complete_order_processing" style="display:none;"><strong class="alert alert-warning"></strong> <br /><img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" width="220" height="19" /></div>
        </div><!-- #fc_complete_order_button_container -->
        {% endblock subscription_cancel %}



    {% endif %}{# not is_subscription_cancel #}
</div>
</div>
</form>
<span class="fc_clear">&nbsp;</span>



{# END CHECKOUT TWIG TEMPLATE #}
{% endblock checkout %}

</div><!-- #container -->


<!-- end page content -->
<script type="text/javascript">
var fb_param = {};
fb_param.pixel_id = '6014717384970';
fb_param.value = '0.00';
fb_param.currency = 'USD';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();
</script>


<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6014717384970&amp;value=0&amp;currency=USD" /></noscript>
<script>

$('.fc_cart_item_name:contains("Paid")').each(function () {
        $(this).closest('.fc_cart_item').hide();
          return false;
    });
</script>
<script>
 $('input[name="Is_this_a_gift"]').change(function() {
          if(2 == $(this).val()) {
              $("#gift_fields").show();
          } else {
              $("#gift_fields").hide();
          }
      });
</script>

<script>

FC.checkout.InitCoupon = function() {
    var colspan = jQuery("#fc_cart_foot_total .fc_col1").attr("colspan");
    fc_cart_foot_discount_new = '<tr id="fc_cart_foot_discount_new"><td class="fc_col1" colspan="' + colspan + '"><a href="#" onclick="FC.checkout.AddCoupon(); this.blur(); return false;">Add a coupon</a></td><td class="fc_col2"><input type="text" name="coupon" id="fc_coupon" class="fc_text fc_text_short" value="" style="display:none;" /><a id="fc_coupon_apply" href="javascript:;" style="display:none;">Apply!</a></td></tr>';
 
    if (jQuery('#fc_cart_foot_discount_new').length == 0) {
        jQuery(fc_cart_foot_discount_new).insertBefore('#fc_cart_foot_shipping');
    }
 
    jQuery('#fc_coupon_apply').unbind('click').click(function(){
        var coupon = jQuery('#fc_coupon').val();
        if (coupon != '') {
            FC.checkout.ApplyCoupon(coupon);
        } else {
            alert('Please enter a coupon code.');
        }
    });
}
 
FC.checkout.AddCoupon = function() {
    jQuery("#fc_coupon, #fc_coupon_apply").toggle();
    if (jQuery("#fc_coupon").is(":visible")) {
        jQuery("#fc_coupon")[0].focus();
    }
}
 
FC.checkout.ApplyCoupon = function(coupon) {
    jQuery('#fc_coupon_apply').html('Loading...');
    jQuery.getJSON('https://' + window.location.hostname + '/cart?output=json&' + FC.checkout.config.session + '&coupon=' + coupon + '&callback=?',
        function(data) {
            if (data.messages.errors.length > 0) {
                alert("We're sorry. An error occurred: " + data.messages.errors[0]);
            } else {
                FC.checkout.BuildCouponTR(data.coupons);
            }
            jQuery('#fc_coupon_apply').html('Apply!');
        }
    );
}
 
FC.checkout.BuildCouponTR = function(coupons) {
    var colspan = jQuery("#fc_cart_foot_total .fc_col1").attr("colspan");
    fc_cart_foot_discounts = '';
    FC.checkout.config.orderDiscount = 0;
    for (var coupon in coupons) {
        fc_cart_foot_discounts += '<tr class="fc_cart_foot_discount"><td class="fc_col1" colspan="' + colspan + '">' + coupons[coupon].name + ':</td><td class="fc_col2"><span class="fc_discount">' + FC.formatter.currency(coupons[coupon].discount, true) + '</span></td></tr>';
        FC.checkout.config.orderDiscount += coupons[coupon].discount;
    }
    jQuery(fc_cart_foot_discounts).insertAfter('#fc_cart_foot_subtotal');
    // Set the subtotal amounts
    jQuery('#discount, label[for=discount]').remove();
    if (FC.checkout.config.orderDiscount != 0) {
        discount_total = '<li class="fc_row fc_discount"><label for="discount" class="fc_pre">Discount</label><input type="text" name="discount" id="discount" class="fc_text fc_text_short fc_text_readonly" readonly="readonly" onfocus="this.blur()" value="' + FC.formatter.currency(FC.checkout.config.orderDiscount) + '" /></li>';
        jQuery(discount_total).insertAfter('li.fc_shipping_cost');
    }
    FC.checkout.updatePriceDisplay();
 
    // Comment the following line out if you want to remove the coupon line once a coupon has been added
    jQuery('#fc_cart_foot_discount_new').remove();
}
 
 
jQuery(document).ready(function(){
    var coupon_length = 0;
    for (var c in fc_json.coupons) {
        if (fc_json.coupons[c].hasOwnProperty('id')) coupon_length++;
    }
    if (coupon_length == 0) FC.checkout.InitCoupon();
 
    // If you'd like to display the "apply coupon" regardless of whether
    // or not a coupon has already been added, comment out the above lines and uncomment the following
    // FC.checkout.InitCoupon();
});
</script>
<?php
include_once('footer.php');
?>