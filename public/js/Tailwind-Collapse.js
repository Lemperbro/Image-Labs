(function() {
    var triggers = document.querySelectorAll("[data-collapse-target]");
    var collapses = document.querySelectorAll("[data-collapse]");

    if (triggers && collapses) {
        Array.from(triggers).forEach(function(trigger) {
            Array.from(collapses).forEach(function(collapse) {
                if (trigger.dataset.collapseTarget === collapse.dataset.collapse) {
                    trigger.addEventListener("click", function() {
                        if (collapse.style.height && collapse.style.height !== "0px") {
                            collapse.style.height = 0;
                            trigger.removeAttribute("open");
                        } else {
                            collapse.style.height = collapse.scrollHeight +
                                "px";
                            trigger.setAttribute("open", "");
                        }
                    });
                }
            });
        });
    }
})();