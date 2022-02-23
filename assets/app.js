/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// You can specify which plugins you need
import { Tooltip, Toast } from 'bootstrap';

// start the Stimulus application
import './bootstrap';

// import 'bootstrap/dist/css/bootstrap.min.css';



var rtbutton = document.querySelectorAll(".RTButton");

if(rtbutton){
    rtbutton.forEach((element) => {
        element.addEventListener("click", () => {
            element.classList.toggle("fw-bold");
            element.classList.toggle("text-primary");
            let elementId = element.getAttribute('data-id');
            
            fetch('/symfotweets/rt/'+elementId)
                .then(function(response) {
                    if(response.ok) {
                        response.blob().then(function(myBlob) {
                          console.log(myBlob);
                        });
                      }
                })
        })
    });
}