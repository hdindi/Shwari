<!DOCTYPE html>
<html>
<body>

<form>
Buttons:
<button id="firstbtn">OK</button>
<button id="secondbtn">OK</button>
</form>

<p>Click the button below to disable the first button above.</p>

<button onclick="disableElement()">Disable button</button>

<script>

function disableElement()
{
document.getElementById("firstbtn").disabled=true;
}

</script>
</body>
</html>