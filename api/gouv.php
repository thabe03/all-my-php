<?php

include '../header.php';

$g = "https://www.donneesquebec.ca/recherche/api/action/package_list";
$jsong = file_get_contents($g);
$dg = json_decode($jsong);
$c = (array)$dg->result;
$b = array_map(function($val) { return str_replace('-', ' ', $val); }, $c);
try {
$v = htmlentities($_GET['v']);
$v = false;
if (filter_has_var(INPUT_POST, 'submit')) {
  $e = htmlentities($_POST['e']);
  $ee = str_replace(" ","-",$e);
  $l = "https://www.donneesquebec.ca/recherche/api/3/action/package_search?q=$ee";
  $json = file_get_contents($l);
  $d = json_decode($json);
  if(!($d->result->results==[])){
    $v = true;
  } else {
    $msg = "La donnée n'existe pas";
    $v = false;
  }
}} catch(Exception $e){
  echo $e;
}
?>
<div class="container">
  <div class="row">
    <div class="col-6 col-lg-6 background mt-5">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <?php if (isset($msg)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
<?php } ?>
  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Recherche de <a href='https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwizyLDx-eL3AhX4jokEHZCpBTkQFnoECAYQAQ&url=https%3A%2F%2Fwww.donneesquebec.ca%2Fpage-api%2F&usg=AOvVaw3AFSZIZ1aY0jaJKAJ3CQIJ' class="text-light text-decoration-none">donnée du gouvernement</a></h5>
  <div class="form-outline mb-4" style="width:300px;">
    <input type="text" class="form-control form-control-lg" placeholder="Données" name="e" autocomplete="off" id="myInput" value="<?php echo isset($_POST['e']) ? $e : ""; ?>"/>
  <button name="submit" class="btn btn-dark btn-lg btn-block" type="submit" style="width:100%;">Recherche</button></div>
</form>
</div>

<?php if (filter_has_var(INPUT_POST, 'submit')&&$v) { ?>
<div class="col-6 col-lg-6 background">
  <div class="card mb-3" style="max-width: 540px; color:black;">
  <div class="row g-0">
    <div class="col-md-12">
      <div class="card-body">
        <h2 class="card-title"><?php echo $d->result->results[0]->groups[0]->display_name; ?></h2>
        <h3 class="card-title"><?php echo $d->result->results[0]->groups[0]->description; ?></h3>
        <p class="card-text"><?php echo $d->result->results[0]->organization->description; ?></p>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
</div>                                                  
<?php } ?>

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = <?php echo json_encode($b); ?>

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>


<?php

include '../footer.php';

?>