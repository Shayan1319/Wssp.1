<!-- <script>
        function validateSection1() {
            var log1 = document.getElementById("file1").value;
            var fName = document.getElementById("fName").value;
            var mName = document.getElementById("mName").value;
            var lName = document.getElementById("lName").value;
            var faName = document.getElementById("faName").value;
            var cNo = document.getElementById("cNo").value;
            var email = document.getElementById("email").value;
            var CAddress = document.getElementById("CAddress").value;
            var city = document.getElementById("city").value;
            var PAddress = document.getElementById("PAddress").value;
            var moNum = document.getElementById("moNum").value;
            var OfPNum = document.getElementById("OfPNum").value;
            var ANum = document.getElementById("ANum").value;
            var DofB = document.getElementById("DofB").value;
            var Religion = document.getElementById("Religion").value;
            var Gender = document.getElementById("Gender").value;
            var BlGroup = document.getElementById("BlGroup").value;
            var Domicile = document.getElementById("Domicile").value;
            var MaritalStatus = document.getElementById("MaritalStatus").value;
            var NextofKin = document.getElementById("NextofKin").value;
            var NextofKinCellNumber = document.getElementById("NextofKinCellNumber").value;
            var ContactPerson = document.getElementById("ContactPerson").value;
            var cPCN = document.getElementById("CPCN").value;
            var vareable1 ="log1 && fName && mName && lName && faName && cNo && email && CAddress && city && PAddress && moNum && OfPNum && ANum && DofB && Religion && Gender && BlGroup && Domicile && MaritalStatus && NextofKin && NextofKinCellNumber && ContactPerson && cPCN";
            if (vareable1) {
                document.getElementById("section1").style.display = "none";
                document.getElementById("section2").style.display = "block";
            } else {
                alert("Please fill in the required fields");
            }
        }

        function validateSection2() {
            var age = document.getElementById("age").value;
            var gender = document.getElementById("gender").value;
            if (age && gender) {
                document.getElementById("section2").style.display = "none";
                document.getElementById("section3").style.display = "block";
            } else {
                alert("Please fill in the required fields");
            }
        }

        function backToSection1() {
            document.getElementById("section2").style.display = "none";
            document.getElementById("section1").style.display = "block";
        }

        function backToSection2() {
            document.getElementById("section3").style.display = "none";
            document.getElementById("section2").style.display = "block";
        }
</script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
    function Child_detale() {
  // Get the number of divs to show from the input field
  var numDivs = document.getElementById("num-divs").value;

  // Clear the existing div container
  var divContainer = document.getElementById("Child_detale");
  divContainer.innerHTML = "";

  // Create the specified number of divs and append them to the div container
  for (var i = 1; i <= numDivs; i++) {
    var div = document.createElement("div");
    div.innerHTML = '  <div class="row"><div class="col-md-4"><label for="">Name</label><input type="text" class="form-control" name="child_name" placeholder="Name" id=""></div><div class="col-md-4"><label for="">Cnic / B form</label><input type="text" class="form-control" name="CNIC_child" placeholder="CNIC / B from" id=""></div><div class="col-md-4"><label for="">Date of birth</label><input type="text" class="form-control" name="DofB" placeholder="Date of birth" id=""></div><div class="col-md-4"><label for="">Gander</label><input type="text" class="form-control" name="Gander" placeholder="Gander" id=""></div></div>  ' + i;
    divContainer.appendChild(div);
  }
}
</script>