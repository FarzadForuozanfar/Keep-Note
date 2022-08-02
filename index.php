<?php 
    include 'database.php';
    include 'header.php';
    $notes = $db->query("SELECT * FROM notes");
    $UIDESIGN = array(
        array("bg-color"=>"bg-light", "text-color"=>"text-dark"),
        array("bg-color"=>"bg-primary", "text-color"=>"text-light"),
        array("bg-color"=>"bg-secondary", "text-color"=>"text-light"),
        array("bg-color"=>"bg-success", "text-color"=>"text-light"),
        array("bg-color"=>"bg-info", "text-color"=>"text-dark"),
        array("bg-color"=>"bg-warning", "text-color"=>"text-dark"),
        array("bg-color"=>"bg-danger", "text-color"=>"text-light"),
        array("bg-color"=>"bg-light", "text-color"=>"text-dark"),
        array("bg-color"=>"bg-dark", "text-color"=>"text-light"),
    );
    function webstandIsRTL(string $string)
    {
        if (preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $string))) {
            return false;
        }
        return true;
    }
?>
<!-- take note form -->
<div class="container-fluid mt-3">
    <div class="d-flex justify-content-center">
        <div class="col-10 col-lg-5 col-md-8 note-div rounded-3" >
            <form action="new_note_proccess.php" method="post">
                <input id="title-note" name="title-note" onclick="Show_detail()" onmouseout="Delete_border()" style="background-color:whitesmoke !important;" placeholder="Take a Note" type="text">
                <?php date_default_timezone_set('Asia/Tehran');?>
                <textarea name="text-note" placeholder="Take a Note . . ." class="form-control mt-3" id="Textarea1" rows="3"></textarea>
                <div class="row mt-3">
                    <div class="col">
                        <label style="display: none;" id="label-date" class="form-label" for="meeting-time">Date & Time</label>
                        <input name="date-note" class="form-control  form-control-sm" type="hidden" id="meeting-time" name="meeting-time" value="<?php echo date('Y-m-d H:i');?>" min="<?php echo date('Y-m-d H:i');?>">
                    </div>
                    <div class="col">
                        <label style="display: none;" id="label-color" for="color" class="form-label">Color</label>
                        <select name="color" style="display: none;" id="color" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="0">None</option>
                            <?php foreach ($UIDESIGN as $key => $value):?>
                                <option class="<?php echo $value['bg-color'];?> <?php echo $value['text-color'];?> " value="<?php echo $key;?>"><?php echo $value['bg-color'];?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div id="buttons" class="d-none flex-row-reverse mt-3">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <button type="button" onclick="DisplayNone()" class="btn btn-secondary btn-sm mx-1">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- echo notes-->
<div class="container mt-5">
    <div class="row mt-2">
            <?php foreach($notes as $note): ?>
                <div class="col-lg-3 mt-3 col-md-6 col-sm-12 col-xs-12 notes">
                    <div class="card <?php echo $UIDESIGN[$note['color']]["bg-color"]; ?> <?php echo $UIDESIGN[$note['color']]["text-color"];?>">
                        <div <?php if(webstandIsRTL($note['text'])):?>dir="rtl"<?php endif;?> class="card-header">
                            <h3>
                                <?php echo $note['title']; ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <p <?php if(webstandIsRTL($note['text'])):?>dir="rtl"<?php endif;?>>
                                <?php echo $note['text']; ?>
                            </p>
                            <hr>
                            <p class="bi bi-alarm">
                                : <?php 
                                    $time = substr($note['time'],0,5);
                                    echo $time;
                                ?>
                            </p>
                            <p class="bi bi-calendar-event">
                                : <?php echo $note['date']; ?>
                            </p>
                            <hr>
                            <p>
                                Created : <?php echo $note['create_time']; ?>
                            </p>
                        </div>
                        <div class="card-footer bg-light">
                            <a class="btn btn-outline-danger btn-sm bi bi-trash me-2 mt-1" href="delete_note.php?id=<?php echo $note['id']?>"></a>
                            <button type="button" class="btn btn-outline-primary btn-sm bi bi-pencil-square mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $note['id'];?>"></button>
                            <div class="modal fade" id="exampleModal<?php echo $note['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $note['id'];?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h1 class="modal-title text-white" id="exampleModalLabel<?php echo $note['id'];?>">Edit Note <?php echo $note['id'];?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="edit_note.php?id=<?php echo $note['id'];?>" method="post">
                                            <div class="modal-body text-dark">
                                                <label class="control-label" for="title">Title :</label>
                                                <input class="form-control" id="title" type="text" name="title" value="<?php echo $note['title'];?>">
                                                <label class="control-label mt-2" for="text">Text :</label>
                                                <input type="text" id="text" name="text" value="<?php echo $note['text'];?>" class="form-control">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <label id="date" class="form-label" for="date">Date & Time</label>
                                                        <input name="date-time" class="form-control  form-control-sm" type="datetime-local" id="date" <?php $date_time=($note['date'].' '.substr($note['time'],0,5));?> name="meeting-time" value="<?php echo $date_time;?>" min="<?php echo date('Y-m-d H:i');?>">
                                                    </div>
                                                    <div class="col">
                                                        <label id="label-color" for="color-edit" class="form-label">Color</label>
                                                        <select name="color" id="color-edit" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                            <?php $color_id = (int)($note['color']);?>
                                                            <option selected class="<?php echo $UIDESIGN[$color_id]['bg-color'];?> <?php echo $UIDESIGN[$color_id]['text-color'];?>" value="<?php echo $note['color'];?>"><?php echo $UIDESIGN[$color_id]['bg-color'];?></option>
                                                            <?php foreach ($UIDESIGN as $key => $value):?>
                                                                <option class="<?php echo $value['bg-color'];?> <?php echo $value['text-color'];?> " value="<?php echo $key;?>"><?php echo $value['bg-color'];?> </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info text-light">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
</div>
<script src="js/script.js"></script>
<!--datetime-local-->
<?php include 'footer.html';?>