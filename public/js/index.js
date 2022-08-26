// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}
$(document).ready(function () {
    var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
    var themeToggleLightIcon = document.getElementById(
        "theme-toggle-light-icon"
    );

    // Change the icons inside the button based on previous settings
    if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        themeToggleLightIcon.classList.remove("hidden");
    } else {
        themeToggleDarkIcon.classList.remove("hidden");
    }

    var themeToggleBtn = document.getElementById("theme-toggle");

    themeToggleBtn.addEventListener("click", function () {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle("hidden");
        themeToggleLightIcon.classList.toggle("hidden");

        // if set via local storage previously
        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        }
    });
    // v2xwa3
    var themeToggleDarkIcon2 = document.getElementById(
        "theme-toggle-dark-icon2"
    );
    var themeToggleLightIcon2 = document.getElementById(
        "theme-toggle-light-icon2"
    );

    // Change the icons inside the button based on previous settings
    if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        themeToggleLightIcon2.classList.remove("hidden");
    } else {
        themeToggleDarkIcon2.classList.remove("hidden");
    }

    var themeToggleBtn2 = document.getElementById("theme-toggle2");

    themeToggleBtn2.addEventListener("click", function () {
        // toggle icons inside button
        themeToggleDarkIcon2.classList.toggle("hidden");
        themeToggleLightIcon2.classList.toggle("hidden");

        // if set via local storage previously
        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        }
    });
});
// loader
$(window).on("load", function () {
    //Do the code in the {}s when the window has loaded
    $("#loadergif").fadeOut("slow"); //Fade out the #loader div
    console.clear();
});
// search
$(document).ready(function () {
    $('.normal-search input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        console.log(inputVal);
        var resultDropdown = $(".results");
        // console.log(resultDropdown);
        if (inputVal.length) {
            $(".loader-se").show();
            $.get("/search/" + inputVal, {
                // term: inputVal,
            }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (resultDropdown.length > 0) {
                    $(".loader-se").hide();
                }
            });
        } else {
            resultDropdown.empty();
        }
    });
});
