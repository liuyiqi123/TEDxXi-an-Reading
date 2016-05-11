<?php
include("head.html");
error_reporting(0);

require_once ('config.php');



require_once 'connectdb.php';


if($_conn){

    mysql_select_db('test',$_conn);
    mysql_query("set names 'utf8' ");
    $result1 = mysql_query("SELECT * FROM submit where `bookid`=1");
    $result2 = mysql_query("SELECT * FROM submit where `bookid`=2");
    $result3 = mysql_query("SELECT * FROM submit where `bookid`=3");
    $result4 = mysql_query("SELECT * FROM submit where `bookid`=4");
    $result5 = mysql_query("SELECT * FROM submit where `bookid`=5");
    $result6 = mysql_query("SELECT * FROM submit where `bookid`=6");
    $result7 = mysql_query("SELECT * FROM submit where `bookid`=7");
    $result8 = mysql_query("SELECT * FROM submit where `bookid`=8");
    $result9 = mysql_query("SELECT * FROM submit where `bookid`=9");
    $result10 = mysql_query("SELECT * FROM submit where `bookid`=10");   }else{
    echo "error";
}






?>
<body style="   background: #333333;">

<div class="row container" style="margin-top: 10px">
    <img src="image/tedlogo.png" class="img-responsive " style=" width: 50%;left: 20px;margin: 5px;float: left">
    <a href="home.php"><img src="image/rulebtn.png" class="img-responsive  rule" style=" width: 20%;margin: 5px;float: right"></a>
</div>

<div id="carousel-example-captions" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img data-src="holder.js/900x500/auto/#777:#777" alt="900x900" src="image/biran.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                <img src="image/booktitle.png" class="img-responsive"></div>


                <?php


                while($row=mysql_fetch_assoc($result1))//将result结果集中查询结果取出一条
                {

                echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>



            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#666" alt="900x900" src="image/robotdance.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                    <img src="image/booktitle.png" class="img-responsive"></div>

                <?php


                while($row=mysql_fetch_assoc($result2))//将result结果集中查询结果取出一条
                {

                    echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>


            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#666" alt="900x900" src="image/thoughtmap.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                    <img src="image/booktitle.png" class="img-responsive"></div>

                <?php


                while($row=mysql_fetch_assoc($result3))//将result结果集中查询结果取出一条
                {

                    echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>


            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#666" alt="900x900" src="image/godraise.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                    <img src="image/booktitle.png" class="img-responsive"></div>

                <?php


                while($row=mysql_fetch_assoc($result4))//将result结果集中查询结果取出一条
                {

                    echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>


            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#666" alt="900x900" src="image/chali.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                    <img src="image/booktitle.png" class="img-responsive"></div>

                <?php


                while($row=mysql_fetch_assoc($result5))//将result结果集中查询结果取出一条
                {

                    echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>


            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#666" alt="900x900" src="image/dontport.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                    <img src="image/booktitle.png" class="img-responsive"></div>

                <?php


                while($row=mysql_fetch_assoc($result6))//将result结果集中查询结果取出一条
                {

                    echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>


            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#666" alt="900x900" src="image/askquestion.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                    <img src="image/booktitle.png" class="img-responsive"></div>

                <?php


                while($row=mysql_fetch_assoc($result7))//将result结果集中查询结果取出一条
                {

                    echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>


            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#666" alt="900x900" src="image/relationship.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                    <img src="image/booktitle.png" class="img-responsive"></div>

                <?php


                while($row=mysql_fetch_assoc($result8))//将result结果集中查询结果取出一条
                {

                    echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>


            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#666" alt="900x900" src="image/pig.png" data-holder-rendered="true">
            <div class="carousel-caption">
                <div class='col-xs-12 ' style='margin-top: 20px;'>
                    <img src="image/booktitle.png" class="img-responsive"></div>

                <?php


                while($row=mysql_fetch_assoc($result9))//将result结果集中查询结果取出一条
                {

                    echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                }


                ?>


            </div>
        </div>
        <div class="item ">
            <img data-src="holder.js/900x500/auto/#555:#555" alt="900x900" src="image/communication.png" data-holder-rendered="true">
                <div class="carousel-caption">
                    <div class='col-xs-12 ' style='margin-top: 20px;'>
                        <img src="image/booktitle.png" class="img-responsive"></div>

                    <?php


                    while($row=mysql_fetch_assoc($result10))//将result结果集中查询结果取出一条
                    {

                        echo"
                <div class='media col-xs-12 ' style='margin-top: 20px;'>

                        <div class='media-left' >
                            <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
                        </div>
                        <div class='media-body' style='padding-top: 1em;'>
                            <p class='media-heading' >
                            ".$row["nickname"]. "<br>
                            ".$row["coment"]. "</p>

                        </div>
                </div>";


                    }


                    ?>


            </div>
        </div>

    </div>


    <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev" style="height: 400px">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next" style="height: 400px">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="row container" style="height: 40px"></div>
</body>
<script type="text/javascript" language="javascript">

    $(document).ready(function(){

        $('.carousel').carousel('pause')
    });

</script>


</html>
