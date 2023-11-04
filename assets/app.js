/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import Alpine from 'alpinejs'

window.Alpine = Alpine
Alpine.start()

import persist from '@alpinejs/persist'

Alpine.plugin(persist)

document.addEventListener("DOMContentLoaded", function () {
    Alpine.start()
})

document.addEventListener("alpine:init", function () {
    Alpine.data('cookieConsent', () => ({
        state: Alpine.$persist('unknown').as('cookieConsent'),

        init() {
            this.dispatchEvent()
        },

        dialogue: {
            ['x-show']() {
                return this.state == 'unknown'
            }
        },

        accept: {
            ['@click']() {
                this.state = 'accepted'

                this.dispatchEvent()
            }
        },

        decline: {
            ['@click']() {
                this.state = 'declined'

                this.dispatchEvent()
            }
        },

        dispatchEvent() {
            document.dispatchEvent(new CustomEvent('cookieConsent', {
                detail: this.state
            }))
        }

    }))
})