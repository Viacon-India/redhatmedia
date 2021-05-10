//@ts-check
"use strict";

function init() {
  // initialize all functions
  hello();
}

// :: FUNCTIONS ::
function hello() {
  console.log("Script has been loaded successfully!");
}

// :: EVENT LISTENERS ::
window.addEventListener("load", init);
