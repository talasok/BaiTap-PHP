<?php include_once ("header.php")?>
<?php include_once ("nav.php")?>
<?php 
    #Code bài số 4
    include_once("model/book.php");
    // $book = new Book(50,"OOP in PHP","ndungit",2019);
    
    $keyWord = null;
    if(isset($_REQUEST["search"])){
        $keyWord =$_REQUEST["search"];
    }
    if (isset($_REQUEST["addBook"])) {
        $id = $_REQUEST["id"];
        $title = $_REQUEST["title"];
        $price = $_REQUEST["price"];
        $author = $_REQUEST["author"];
        $year = $_REQUEST["year"];
        $content = $id . "#" . $title . "#" . $price . "#" . $author . "#" . $year;
        Book::addToFile($content);
        
    }
    if (isset($_REQUEST["editBook"])) {
        $id    = $_REQUEST["id"];
        $title = $_REQUEST["title"];
        $price = $_REQUEST["price"];
        $author= $_REQUEST["author"];
        $year  = $_REQUEST["year"];
        $book = new Book($id,$price,$title,$author,$year);
        Book::editItem($book,Book::getListFromFile());
    }
    if(isset($_REQUEST["action"])){
        if(strcmp($_REQUEST["action"],"xoa")==0){
            Book::delete(Book::getListFromFile(),$_REQUEST["id"]);
        }
    } 
    
    //$ls=Book::getList(); //Mockdata
    $sl=Book::getListFromFile();
    $lsFromFile=Book::getSearch($keyWord);
    ?>
<div class="container" >
    <div>
        <form action="" method="get" style="display: flex;">
            <input type="text" name="search" value="<?php echo $keyWord;?>" class="form-control" placeholder="Search for..." >
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <!-- thêm -->
    <div class="row" style="padding-top: 40px;">
        <button data-toggle="modal" data-target="#addModal" class="btn btn-outline-primary" style="margin-left: 1025px"><i class="fas fa-plus-circle"></i> Thêm</button>
    </div>
    <!-- modal -->
    <form action="baiso4.php" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
                    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <fieldset>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">ID</label>
                                <div class="col-md-10">
                                    <input id="id" name="id" type="text" placeholder="ID" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">Title</label>
                                <div class="col-md-10">
                                    <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">Price</label>
                                <div class="col-md-10">
                                    <input id="price" name="price" type="text" placeholder="Price" class="form-control input-md">
                                </div>
                            </div>
                            <!-- Select Basic -->
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Year">Year</label>
                                <div class="col-md-10">
                                    <input type="text" id="year" name="year" class="form-control input-md">   
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Author">Author</label>
                                <div class="col-md-10">
                                    <input id="author" name="author" type="text" placeholder="Author" class="form-control input-md">

                                </div>
                            </div>
                        </fieldset>
                    </div>  
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addBook" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- modal sửa -->
    <form action="baiso4.php" method="get">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa</h5>
                        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <fieldset>
                                <div class="form-group d-flex">
                                    <label class="pt-1 col-md-2 control-label" for="Title">ID</label>
                                    <div class="col-md-10">
                                        <input  id="id1" name="id" type="text" placeholder="222" class="form-control input-md" value="">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="pt-1 col-md-2 control-label" for="Title">Title</label>
                                    <div class="col-md-10">
                                        <input id="title1" name="title" type="text" value="" placeholder="Title" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="pt-1 col-md-2 control-label" for="Title">Price</label>
                                    <div class="col-md-10">
                                        <input id="price1" name="price" type="text" value="" placeholder="Price" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="form-group d-flex">
                                    <label class="pt-1 col-md-2 control-label" for="Year">Year</label>
                                    <div class="col-md-10">
                                        <input type="text" id="year1" name="year" value="" class="form-control input-md"> 
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group d-flex">
                                    <label class="pt-1 col-md-2 control-label" for="Author">Author</label>
                                    <div class="col-md-10">
                                        <input id="author1" name="author" value="" type="text" placeholder="Author" class="form-control input-md">
                                    </div>
                                </div>
                            </fieldset>
                        </div>  
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="editBook" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    <!-- table -->
    <div class="row">
        <table class ="table table-bordered" >
            <thead class="thead-dark" align="center">
                <tr>
                    <th colspan="1"> STT</th>
                    <th colspan="2"> Title</th>
                    <th colspan="2"> Pricec</th>
                    <th colspan="2"> Author</th>
                    <th colspan="2">Year</th>
                    <th colspan="6"> Thao tác </th  >
                  </tr>
             </thead>
            <tbody align="center">
               <?php 
               //độ dài list ls
               // count($ls)
               foreach ($lsFromFile as $key => $value) {
                ?>
               <tr>
                    <th colspan="1"><?php echo $key ?></th>
                    <td colspan="2"><?php echo $value->title ?></td>
                    <td colspan="2"><?php echo $value->price?></td>
                    <td colspan="2"><?php echo $value->author ?></td>
                    <td colspan="2"> <?php echo $value->year ?></td> 
                    <td> <button onclick="func(this)" id="editBook" data-toggle="modal" data-target="#editModal" class="btn btn-outline-warning" name="BtnEdit"
                    eid="<?php echo $value->id ?>" etitle="<?php echo $value->title ?>" eauthor="<?php echo $value->author ?>" eyear="<?php echo $value->year ?>" eprice="<?php echo $value->price ?>"
                    >
                    <i class="fas fa-edit"></i>Sửa </button>
                    <a href="baiso4.php?action=xoa&&id=<?php echo $key ?>" type="submit" class="btn btn-outline-danger" nanme="deleteBook"><i class="fas fa-trash-alt"></i>Xóa </a>
                    </td>
               </tr>
               <?php }?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once ("footer.php")?>