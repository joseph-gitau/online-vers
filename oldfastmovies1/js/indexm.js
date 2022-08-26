window.onscroll = function () {
  myFunction();
};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}

$(window).on("load", function () {
  //Do the code in the {}s when the window has loaded
  $(".loadgif").fadeOut("slow"); //Fade out the #loader div
  console.clear();
  
});

const hamberger = document.querySelector(".hamberger");
const svgicon = document.querySelector(".searchIcon");
const navlinks = document.querySelector(".navlinks");
const links = document.querySelectorAll(".navlinks li");
const popular = document.querySelector("section");

// navlinks.classList.toggle('open');
hamberger.addEventListener("click", () => {
  navlinks.classList.toggle("open");
  // navlinks.style.display = 'flex';
});
// navlinks.classList.toggle('open');
svgicon.addEventListener("click", () => {
  navlinks.classList.toggle("open");
  // navlinks.style.display = 'flex';
});

$(".active").click(function () {
  $(".search-box1").toggle();
  $("input[type='text']").focus();
});

var value = $("#msearch_type").val();
$("#msearch_type").on("change", handleSelectChange);
function handleSelectChange(event) {
  var selement = event.target;
  value = selement.value;
  $("#search").attr("placeholder", "Search " + value);
  // console.log(value);
}
$("#search").on("input", function () {
  inputValRaw = $(this).val();
  inputVals = value + "q" + inputValRaw;
  // console.log(value + inputVals);
//   console.log(inputVals);
});

$(document).ready(function () {
  $('.normal-search input[type="text"]').on("keyup input", function () {
    /* Get input value on change */
    var inputVal = $(this).val();
    var resultDropdown = $("#result");
    // console.log(resultDropdown);
    if (inputVal.length) {
        $(".loader-se").show();
      $.get("https://fastmovies1.com/ajax-live-search.php", { term: inputVal }).done(function (data) {
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
  $(document).on("click", ".result p", function () {
    $(this)
      .parents(".normal-search")
      .find('input[type="text"]')
      .val($(this).text());
    $(this).parent(".result").empty();
  });
});

// broken links
$(document).ready(function () {
  $("#broken-url").submit(function (event) {
    var formData = {
      name: $("#broken-1").val(),
      email: $("#email").val(),
      urlTrim: $("#broken-2").val(),
    };

    $.ajax({
      type: "GET",
      url: "https://fastmovies1.com/process.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);

      if (data.success) {
        $("form").html(
          '<div class="alert alert-success" id="brokenSuccess"> <h3>Thank you for your feedback.</h3></div>'
        );
        // window.setTimeout(function () {
        //   window.location.href = "https://fastmovies1.com/movies/680-Blacklight";
        // }, 5000);
        $("#broken-url").delay(5000).fadeOut();
      } else {
        $("form").html('<div class="alert alert-success">Fail</div>');
      }
    });

    event.preventDefault();
  });
  
});

$(document).ready(function () {
    console.clear();
});


