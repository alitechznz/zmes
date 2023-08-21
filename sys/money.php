 <?php
 
 /*
$number = 1234.56;
setlocale(LC_MONETARY,"en_TZs");
echo money_format("The price is %i", $number);
*/


?> 
<style>
    html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}


body {
  background: #f5f5f5;
  color: #333;
  font-family: arial, helvetica, sans-serif;
  font-size: 32px;
}

h1 {
  font-size: 32px;
  text-align: center;
}

p {
  font-size: 20px;
  line-height: 1.5;
  margin: 40px auto 0;
  max-width: 640px;
}

pre {
  background: #eee;
  border: 1px solid #ccc;
  font-size: 16px;
  padding: 20px;
}

form {
  margin: 40px auto 0;
}

label {
  display: block;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

input {
  border: 2px solid #333;
  border-radius: 5px;
  color: #333;
  font-size: 32px;
  margin: 0 0 20px;
  padding: .5rem 1rem;
  width: 100%;

}

button {
  background: #fff;
  border: 2px solid #333;
  border-radius: 5px;
  color: #333;
  font-size: 16px;
  font-weight: bold;
  padding: 1rem;
}

button:hover {
  background: #333;
  border: 2px solid #333;
  color: #fff;
}

.main {
  background: #fff;
  border: 5px solid #ccc;
  border-radius: 10px;
  margin: 40px auto;
  padding: 40px;
  width: 80%;
  max-width: 700px;
}
</style>
<script type="text/javascript">
    // Jquery Dependency
$("input[data-type='currency']").on({
  keyup: function() {
    formatCurrency($(this));
  },
  blur: function() { 
    formatCurrency($(this), "blur");
  }
});


function formatNumber(n) {
// format number 1000000 to 1,234,567
return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
// appends $ to value, validates decimal side
// and puts cursor back in right position.

// get input value
var input_val = input.val();

// don't validate empty input
if (input_val === "") { return; }

// original length
var original_len = input_val.length;

// initial caret position 
var caret_pos = input.prop("selectionStart");
  
// check for decimal
if (input_val.indexOf(".") >= 0) {

  // get position of first decimal
  // this prevents multiple decimals from
  // being entered
  var decimal_pos = input_val.indexOf(".");

  // split number by decimal point
  var left_side = input_val.substring(0, decimal_pos);
  var right_side = input_val.substring(decimal_pos);

  // add commas to left side of number
  left_side = formatNumber(left_side);

  // validate right side
  right_side = formatNumber(right_side);
  
  // On blur make sure 2 numbers after decimal
  if (blur === "blur") {
    right_side += "00";
  }
  
  // Limit decimal to only 2 digits
  right_side = right_side.substring(0, 2);

  // join number by .
  input_val = "$" + left_side + "." + right_side;

} else {
  // no decimal entered
  // add commas to number
  // remove all non-digits
  input_val = formatNumber(input_val);
  input_val = "$" + input_val;
  
  // final formatting
  if (blur === "blur") {
    input_val += ".00";
  }
}

// send updated string to input
input.val(input_val);

// put caret back in the right position
var updated_len = input_val.length;
caret_pos = updated_len - original_len + caret_pos;
input[0].setSelectionRange(caret_pos, caret_pos);
}
</script>
<div class="main">
    <h1>Auto Formatting Currency</h1>
    
    <form method="post" action="#">
    <label for="currency-field">Enter Amount</label>
    <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00">
    <button type="submit">Submit</button>
  </form>
  
  <p>Auto format currency input field with commas and decimals if needed. Text is automatically formated with commas and cursor is placed back where user left off after formatting vs cursor moving to the end of the input. Validation is on KeyUp and a final validation is done on blur.</p>
  
  <p>To use just add the following to an input field:</p>
    
   <pre>data-type="currency"</pre>
    
  </div><!-- /main -->