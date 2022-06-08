<link rel="stylesheet" href="../public/css/import/pagination.css">
<?php
?>
<div class="pagination">
      <?php     if(isset( $_GET['idcategory'])) {?>
        
          <?php
           $pagea = $currentPage >1 ? $currentPage-1:$currentPage;
          ?>
           <a href="?page=<?=$pagea?>&idcategory=<?php echo $idcategory ?>" >BACK</a>
     
   <?php for ($x = 1; $x <= $totalPages; $x++) { ?> 
       <a href="?page=<?= $x?>&idcategory=<?php echo $idcategory ?>" ><?= $x ?></a>
  <?php }?>

  <?php 
        if($currentPage < $totalPages){?>
           <a href="?page=<?=$currentPage+1?>&idcategory=<?php echo $idcategory ?>">NEXT</a>
     <?php }}else{?>
              
          <?php
           $pagea = $currentPage >1 ? $currentPage-1:$currentPage;
          ?>
           <a href="?page=<?=$pagea?>" >BACK</a>
     
   <?php for ($x = 1; $x <= $totalPages; $x++) { ?> 
       <a href="?page=<?= $x?>" ><?= $x ?></a>
  <?php }?>
  <?php 
        if($currentPage < $totalPages){?>
           <a href="?page=<?=$currentPage+1?>">NEXT</a>
          <?php  }} ?>
</div>