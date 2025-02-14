var FormWidgets = function() {
    var e;
    return {
        init: function() {
            ! function() {
                $("#m_datepicker").datepicker({
                    todayHighlight: !0,
					orientation: "bottom left",
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                }), $("#m_datetimepicker").datetimepicker({
                    pickerPosition: "bottom-left",
                    todayHighlight: !0,
                    autoclose: !0,
                    format: "yyyy.mm.dd hh:ii"
                }), $("#m_datetimepicker").change(function() {
                    e.element($(this))
                }), $("#m_timepicker").timepicker({
                    minuteStep: 1,
                    showSeconds: !0,
                    showMeridian: !0
                }), $("#m_daterangepicker").daterangepicker({
                    buttonClasses: "m-btn btn",
                    applyClass: "btn-primary",
                    cancelClass: "btn-secondary"
                }, function(t, i, a) {
                    var r = $("#m_daterangepicker").find(".form-control");
                    r.val(t.format("YYYY/MM/DD") + " / " + i.format("YYYY/MM/DD")), e.element(r)
                }), $("[data-switch=true]").bootstrapSwitch(), $("[data-switch=true]").on("switchChange.bootstrapSwitch", function() {
                    e.element($(this))
                }), $("#m_bootstrap_select").selectpicker(), $("#m_bootstrap_select").on("changed.bs.select", function() {
                    e.element($(this))
                }), $("#m_select2").select2({
                    placeholder: "Select a state",
                    width: '100%'
                }), $("#m_select2").on("select2:change", function() {
                    e.element($(this))
                });
                var t = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    prefetch: "https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/typeahead/countries.json"
                });
                $("#m_typeahead").typeahead(null, {
                    name: "countries",
                    source: t
                }), $("#m_typeahead").bind("typeahead:select", function(t, i) {
                    e.element($("#m_typeahead"))
                })
            }(), e = $("#m_form_1").validate({
                rules: {
                    date: {
                        required: !0,
                        date: !0
                    },
                    daterange: {
                        required: !0
                    },
                    datetime: {
                        required: !0
                    },
                    time: {
                        required: !0
                    },
                    select: {
                        required: !0,
                        minlength: 2,
                        maxlength: 4
                    },
                    select2: {
                        required: !0
                    },
                    typeahead: {
                        required: !0
                    },
                    switch: {
                        required: !0
                    },
                    markdown: {
                        required: !0
                    }
                },
                invalidHandler: function(e, t) {
                    $("#m_form_1_msg").removeClass("m--hide").show(), mUtil.scrollTo("m_form_1_msg", -200)
                },
                submitHandler: function(e) {}
            })
        }
    }
}();
jQuery(document).ready(function() {
    FormWidgets.init()
});