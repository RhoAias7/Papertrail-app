<DOCTYPE! html>
<html>
<head>
<link rel="shortcut icon" type="image/png" class="img-fluid" href="../../img/plane.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Papertrail - Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script src="../stuff/js/lib/arbor.js"></script>
    <script src="../stuff/js/lib/graphics.js"></script>
    <script src="../stuff/js/lib/renderer.js"></script>
    <!-- <script src="main.js"></script> -->
    <script src="../script/rate.js"></script>
    <!-- <script src="fileRate.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/indexStyle.css">
    <meta charset="utf-8"/>
</head>

<body style="background-color:lightblue">
<div class="row formContainer">
    <div class="rateForm form">
        <div class="card-title form">
            <h5 id="cardh5">RATE THIS NODE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <!-- TODO: Close Button -->
            <button class="btn btn-info downloadBtn"><i class="far fa-save"></i>Download</button>

        </div>  

        <div class="card-body form">
            <h6 id="cardh6">Select one of the options below:</h6>
            <form class="form-group" method="post" role="form" action="user_rating.php">
            <ul>
                <div class="row rateRow" id="perRow" onclick="perRate()">
                    <div class="col-3 checkSide"><input id="changePer" class="check" type="radio" name="rate"></div>
                    <div class="col-9 textSide">PERFECT</div>
                </div>
                <div class="row rateRow" id="relRow" onclick="relRate()">
                    <div class="col-3 checkSide"><input id="changeRel" class="check" type="radio" name="rate"></div>
                    <div class="col-9 textSide">RELEVANT</div>
                </div> 
                <div class="row rateRow" id="irelRow" onclick="irelRate()">
                    <div class="col-3 checkSide"><input id="changeIrel" class="check" type="radio" name="rate"></div>
                    <div class="col-9 textSide">IRRELEVANT</div>
                </div>
            </ul>
<!--Bottom half of form becomes visible once a rating is selected -->
            <div class="showHideBottom">
                <label>Have your say..</label>
                <div class="row formBottom">
                    <div class="row">
                        <div class="col-9 textField">
                            <textarea class="form-control tf" rows="3" id="userComment" placeholder="Your comment here.." name="usrComment"></textarea>
                        </div>
                        <div class="col-3">                    
                            <button type="submit" class="btn commentSubmit"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>