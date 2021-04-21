(function ($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    $(window).load(function () {
        let runningPaceCalculatorComponent = document.getElementById('running-pace-calculator-component');

        if (runningPaceCalculatorComponent) {
            let listeners = [];

            let metric = runningPaceCalculatorComponent.getAttribute('data-metric');

            let hours = document.getElementById('hours');
            let minutes = document.getElementById('minutes');
            let seconds = document.getElementById('seconds');
            let distance = document.getElementById('distance');

            let pace_hours = document.getElementById('pace_hours');
            let pace_minutes = document.getElementById('pace_minutes');
            let pace_seconds = document.getElementById('pace_seconds');

            document.getElementById('mathonDistance').addEventListener('click', function () {
                if (metric === 'km') {
                    distance.value = 42.194988;
                } else {
                    distance.value = 26.21875;
                }
                paceCalculation();
            });
            document.getElementById('halfMarathonDistance').addEventListener('click', function () {
                if (metric === 'km') {
                    distance.value = 21.097494;
                } else {
                    distance.value = 13.109375;
                }
                paceCalculation();
            });
            document.getElementById('tenKilometersDistance').addEventListener('click', function () {
                if (metric === 'km') {
                    distance.value = 10;
                } else {
                    distance.value = 6.21371192;
                }
                paceCalculation();
            });

            listeners.push(hours);
            listeners.push(minutes);
            listeners.push(seconds);

            listeners.push(distance);


            listeners.forEach(item => {
                item.addEventListener('change', paceCalculation);
                item.addEventListener('keyup', paceCalculation);
            });

            function paceCalculation() {
                let secondsValue = 0;
                let minutesValue = 0;
                let hoursValue = 0;

                if (parseInt(seconds.value)) {
                    secondsValue = parseInt(seconds.value);
                }
                if (parseInt(minutes.value)) {
                    minutesValue = parseInt(minutes.value) * 60;
                }
                if (parseInt(hours.value)) {
                    hoursValue = parseInt(hours.value) * 60 * 60;
                }

                let distanceValue = 0;
                if (parseInt(distance.value)) {
                    distanceValue = parseInt(distance.value);
                }

                let totalTime = secondsValue + minutesValue + hoursValue;

                let timePerDistance = totalTime / distanceValue;

                let hourPaceValue = 0;
                if (timePerDistance >= 3600) {
                    hourPaceValue = Math.floor(timePerDistance / 3600);
                    timePerDistance = timePerDistance - (hourPaceValue * 3600);
                }

                let minutePaceValue = 0;
                if (timePerDistance >= 60) {
                    minutePaceValue = Math.floor(timePerDistance / 60);
                    timePerDistance = timePerDistance - (minutePaceValue * 60);
                }

                let secondPaceValue = Math.round(timePerDistance);

                if (hourPaceValue > 0) {
                    pace_hours.innerText = hourPaceValue + 'h:';
                    pace_minutes.innerText = minutePaceValue + 'min:';
                    pace_seconds.innerText = secondPaceValue + 'sec';
                } else {
                    pace_hours.innerText = null;
                    pace_minutes.innerText = minutePaceValue + ':';
                    if (secondPaceValue < 10) {
                        pace_seconds.innerText = '0' + secondPaceValue;
                    } else {
                        pace_seconds.innerText = secondPaceValue;
                    }
                }
            }
            paceCalculation();
        }
    });

})(jQuery);

