<?php  require 'header.php';
require 'aside.php';
?>
<main>
    <script>
        var array = document.getElementsByClassName('disabled');
        var button = document.getElementById('editButton');
        var uploadNewProfile = document.getElementById('disabled');
        console.log(uploadNewProfile);
        function hide(){
            uploadNewProfile.style.display = "none";
        }
        button.disabled = true;
        function enable() {


                    for (var index in array) {
                        array[index].disabled = false;
                        console.log(array[index])
                    }
            uploadNewProfile.style.display="inline-block";

                }
    </script>
 <figure id="profilePic">
     <a href="#"><img width="200" height="200" src="img/random.jpg"></a>
 </figure>
    <div id="userDetails" onload="hide()">
    <form action="">
        <label for="">Email:</label>
        <input type="text" value="tupooooo@abv.bg" class="disabled" disabled/>
        <label for="">Name:</label>
        <input type="text" value="noname nofamily" class="disabled" disabled/>
        <label class="disabled" id="disabled" >Upload new profile picture</label>
        <input type="file" class="disabled"  disabled/>
        <a href="#" class="btn btn-primary btn-xs" id="editButton" onclick="enable()">edit profile</a>
        <input type="submit"  class="disabled" disabled />
    </form>
    </div>
    <div id="albums">

    </div>


</main>
<?php require 'footer.php';
?>