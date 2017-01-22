<?php
$pageTitle = "Teachers";
?>
<?php
include('init.php');
include('header.php');
 ?>


 <div class='content'>

<?php

//create table data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
//$search=(isset($_REQUEST['q']))?'WHERE name LIKE "%'.$_REQUEST['q'].'%"':'';
$query = 'select * from practitioners where active = true and profile like "%Founder%" or profile like "%Sport%" order by id';//.$search;
$table->rec_per_page = 0;
$table->create_table($query,$page,$order);
if($table->get_num_rows()){
?>
<h1>Trainers</h1>

<div class="container marketing">
<div class="row">
  <?php
  $class = 'dis';
  $cc = 0;

  	while ($row =  mysqli_fetch_array($table->recordset, MYSQLI_ASSOC)) {
  	$cc++;
  	?>
    <div class="teacherListBox col-lg-3  col-md-4 col-sm-6 col-xs-12">
  		<a href="teacher.php?id=<?=$row['id']?>">
  			<img src="<?='upload/'.$row['id'].'.jpg'?>"  class="img-thumbnail" width="150px">
  		</a>
  		<h4><a href="teacher.php?id=<?=$row['id']?>"><?=$row['name']?> <?=$row['surname']?></a></h4>
  		<div class="">
  			<b><?=$row['profile']?></b>	<br>
  			Location: <b><?=$row['residence']?></b>
  				<?php
  				$i = 0;
  				if(isset($row['scheduling'])){
            echo "<ul>";
  					foreach($row['scheduling'] as $time) {
  					$time=explode('||',$time);
  					if($i>2)unset($time);
  					if(isset($time)){
  					?>
  					<li>
  						<?=$time[0]?>
  						 at <b><?=$time[1]?></b>
  					</li>
  					<?php
  						}
  					$i++;
  					}
            echo "</ul>";
  				}
  				?>

      </div>
    </div>
  <?php

  //end of while($practs)
  }

  }

  ?>






<?php


//create table data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
//$search=(isset($_REQUEST['q']))?'WHERE name LIKE "%'.$_REQUEST['q'].'%"':'';
$query = 'select * from practitioners where active = true and profile like "%Trainer%"  and profile not like "%Founder%" and profile not like "%Sport%" order by id';//.$search;
$table->rec_per_page = 0;
$table->create_table($query,$page,$order);
if($table->get_num_rows()){
?>

  <?php
  $class = 'dis';
  $cc = 0;

  	while ($row =  mysqli_fetch_array($table->recordset, MYSQLI_ASSOC)) {
  	$cc++;
  	?>
    <div class="teacherListBox col-lg-3  col-md-4 col-sm-6 col-xs-12">
  		<a href="teacher.php?id=<?=$row['id']?>">
  			<img src="<?='upload/'.$row['id'].'.jpg'?>" class="img-thumbnail" width="150px">
  		</a>
  		<h4><a href="teacher.php?id=<?=$row['id']?>"><?=$row['name']?> <?=$row['surname']?></a></h4>
  		<div class="">
  			<b><?=$row['profile']?></b>	<br>
  			Location: <b><?=$row['residence']?></b>
  				<?php
  				$i = 0;
  				if(isset($row['scheduling'])){
            echo "<ul>";
  					foreach($row['scheduling'] as $time) {
  					$time=explode('||',$time);
  					if($i>2)unset($time);
  					if(isset($time)){
  					?>
  					<li>
  						<?=$time[0]?>
  						 at <b><?=$time[1]?></b>
  					</li>
  					<?php
  						}
  					$i++;
  					}
            echo "</ul>";
  				}
  				?>


      </div>
    </div>
  <?php

  //end of while($practs)
  }

  }

  ?>
</div><!--. container -->
</div><!--. row -->

<?php

/*
	TEACHERS
*/

$query = 'select * from practitioners where active = true and TT like "%Spain%" and profile not like "%Founder%" and profile not like "%Trainer%" order by name';//.$search;
$table->rec_per_page = 0;
$table->create_table($query,$page,$order);
if($table->get_num_rows()){
?>
    <h1>Teachers</h1>
    <h2>Spain 2016</h2>
<div class="container marketing">
<div class="row">
  <?php
  $class = 'dis';
  $cc = 0;

  	while ($row =  mysqli_fetch_array($table->recordset, MYSQLI_ASSOC)) {
  	$cc++;
  	?>
    <div class="teacherListBox col-lg-3  col-md-4 col-sm-6 col-xs-12">
  		<a href="teacher.php?id=<?=$row['id']?>">
  			<img src="<?='upload/'.$row['id'].'.jpg'?>"  class="img-thumbnail" width="150px">
  		</a>
  		<h4><a href="teacher.php?id=<?=$row['id']?>"><?=$row['name']?> <?=$row['surname']?></a></h4>
  		<div class="">
  			<b><?=$row['profile']?></b>	<br>
  			Location: <b><?=$row['residence']?></b>
  				<?php
  				$i = 0;
  				if(isset($row['scheduling'])){
            echo "<ul>";
  					foreach($row['scheduling'] as $time) {
  					$time=explode('||',$time);
  					if($i>2)unset($time);
  					if(isset($time)){
  					?>
  					<li>
  						<?=$time[0]?>
  						 at <b><?=$time[1]?></b>
  					</li>
  					<?php
  						}
  					$i++;
  					}
            echo "</ul>";
  				}
  				?>

      </div>
    </div>
  <?php

  //end of while($practs)
  }

  }

  ?>
</div><!--. container -->
</div><!--. row -->

<?php  
/* Teacher */
$query = 'select * from practitioners where active = true and TT like "%Mexico%" and profile not like "%Founder%" and profile not like "%Trainer%" order by name';//.$search;
$table->rec_per_page = 0;
$table->create_table($query,$page,$order);
if($table->get_num_rows()){

?>
    
    <h2>Mexico 2015</h2>
<div class="container marketing">
    <div class="row">
	<?php
	$class = 'dis';
	$cc = 0;

  	while ($row =  mysqli_fetch_array($table->recordset, MYSQLI_ASSOC)) {
  	    $cc++;
  	?>
	    <div class="teacherListBox col-lg-3  col-md-4 col-sm-6 col-xs-12">
  		<a href="teacher.php?id=<?=$row['id']?>">
  		    <img src="<?='upload/'.$row['id'].'.jpg'?>"  class="img-thumbnail" width="150px">
  		</a>
  		<h4><a href="teacher.php?id=<?=$row['id']?>"><?=$row['name']?> <?=$row['surname']?></a></h4>
  		<div class="">
  		    <b><?=$row['profile']?></b>	<br>
  		    Location: <b><?=$row['residence']?></b>
  		    <?php
  		    $i = 0;
  		    if(isset($row['scheduling'])){
			echo "<ul>";
  			foreach($row['scheduling'] as $time) {
  			    $time=explode('||',$time);
  			    if($i>2)unset($time);
  			    if(isset($time)){
  		    ?>
  			<li>
  			    <?=$time[0]?>
  			    at <b><?=$time[1]?></b>
  			</li>
  		    <?php
  		    }
  		    $i++;
  		    }
		    echo "</ul>";
  		    }
  		    ?>

		</div>
	    </div>
	<?php

	//end of while($practs)
	}

	}

	?>
    </div><!--. container -->
</div><!--. row -->



<?php  
/* Teacher */
$query = 'select * from practitioners where active = true and TT like "%Thailand%2015%" and profile not like "%Founder%" and profile not like "%Trainer%" order by name';//.$search;
$table->rec_per_page = 0;
$table->create_table($query,$page,$order);
if($table->get_num_rows()){

?>
    
    <h2>Thailand 2015</h2>
    <div class="container marketing">
	<div class="row">
	    <?php
	    $class = 'dis';
	    $cc = 0;

  	    while ($row =  mysqli_fetch_array($table->recordset, MYSQLI_ASSOC)) {
  		$cc++;
  	    ?>
		<div class="teacherListBox col-lg-3  col-md-4 col-sm-6 col-xs-12">
  		    <a href="teacher.php?id=<?=$row['id']?>">
  			<img src="<?='upload/'.$row['id'].'.jpg'?>"  class="img-thumbnail" width="150px">
  		    </a>
  		    <h4><a href="teacher.php?id=<?=$row['id']?>"><?=$row['name']?> <?=$row['surname']?></a></h4>
  		    <div class="">
  			<b><?=$row['profile']?></b>	<br>
  			Location: <b><?=$row['residence']?></b>
  			<?php
  			$i = 0;
  			if(isset($row['scheduling'])){
			    echo "<ul>";
  			    foreach($row['scheduling'] as $time) {
  				$time=explode('||',$time);
  				if($i>2)unset($time);
  				if(isset($time)){
  			?>
  			    <li>
  				<?=$time[0]?>
  				at <b><?=$time[1]?></b>
  			    </li>
  			<?php
  			}
  			$i++;
  			}
			echo "</ul>";
  			}
  			?>

		    </div>
		</div>
	    <?php

	    //end of while($practs)
	    }

	    }

	    ?>
	</div><!--. container -->
    </div><!--. row -->



    <?php  
    /* Teacher */
    $query = 'select * from practitioners where active = true and TT not like "%Thailand%2015%" and TT not  like "%Mexico%" and TT not like "%Spain%" and profile not like "%Founder%" and profile not like "%Trainer%" order by name';//.$search;
    $table->rec_per_page = 0;
    $table->create_table($query,$page,$order);
    if($table->get_num_rows()){

    ?>
	
	<h2>Thailand & Goa 2013</h2>
	<div class="container marketing">
	    <div class="row">
		<?php
		$class = 'dis';
		$cc = 0;

  		while ($row =  mysqli_fetch_array($table->recordset, MYSQLI_ASSOC)) {
  		    $cc++;
  		?>
		    <div class="teacherListBox col-lg-3  col-md-4 col-sm-6 col-xs-12">
  			<a href="teacher.php?id=<?=$row['id']?>">
  			    <img src="<?='upload/'.$row['id'].'.jpg'?>"  class="img-thumbnail" width="150px">
  			</a>
  			<h4><a href="teacher.php?id=<?=$row['id']?>"><?=$row['name']?> <?=$row['surname']?></a></h4>
  			<div class="">
  			    <b><?=$row['profile']?></b>	<br>
  			    Location: <b><?=$row['residence']?></b>
  			    <?php
  			    $i = 0;
  			    if(isset($row['scheduling'])){
				echo "<ul>";
  				foreach($row['scheduling'] as $time) {
  				    $time=explode('||',$time);
  				    if($i>2)unset($time);
  				    if(isset($time)){
  			    ?>
  				<li>
  				    <?=$time[0]?>
  				    at <b><?=$time[1]?></b>
  				</li>
  			    <?php
  			    }
  			    $i++;
  			    }
			    echo "</ul>";
  			    }
  			    ?>

			</div>
		    </div>
		<?php

		//end of while($practs)
		}

		}

		?>
	    </div><!--. container -->
	</div><!--. row -->



</div><!--. content -->


<?php include('footer.php'); ?>
