/**
 * @file
 * Javascript for the node content editing form.
 */

(function ($, Drupal) {

    'use strict';

    /**
     * Behaviors for setting summaries on content type form.
     *
     * @type {Drupal~behavior}
     *
     * @prop {Drupal~behaviorAttach} attach
     *   Attaches summary behaviors on content type edit forms.
     */
    Drupal.behaviors.blendle = {
        attach: function (context) {
            var $context = $(context);

            console.log('joeje');
            // Provide the vertical tab summaries.
            $context.find('#edit-blendle').drupalSetSummary(function (context) {
                var vals = [];
                var $editContext = $(context);
                if ($editContext.find('#edit-blendle-enable-node').is(':checked')) {
                    vals.push(Drupal.t("Enabled"));
                }

                if ($editContext.find('#edit-blendle-default-status-node').is(':checked')) {
                    vals.push(Drupal.t("Default on"));
                }

                return vals.join(', ');
            });
        }
    };

})(jQuery, Drupal);
