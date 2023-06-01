<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2>WAPS with Simulation</h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Project Details</strong></li>
                                <li id="personal"><strong>Input Tasks</strong></li>
                                <li id="payment"><strong>Results</strong></li>
                                <li id="confirm"><strong>Get Access</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div>
                                    DITO YUNG UNA
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div>
                                    DITO YUNG PANGALAWA
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                <input type="button" name="next" class="next action-button" value="Calculate" />
                            </fieldset>
                            <fieldset>
                                <div>
                                    DITO YUNG PANGATLO
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                <input type="button" name="make_payment" class="next action-button" value="Finish" />
                            </fieldset>
                            <fieldset>
                                <div>
                                    DITO YUNG PANG APAT
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    html {
        height: 100%;
    }
</style>

<script>
    $(document).ready(function() {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function() {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $('.radio-group .radio').click(function() {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $(".submit").click(function() {
            return false;
        })

    });
</script>