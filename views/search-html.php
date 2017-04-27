<?php
$out = "<form method='post' action='?page=search'>
    <input type='text' name='keyword' class='form-control' placeholder='Search posts'>
    by <Select name='field'>
        <Option value='post_text'>posts</option>
        <Option value='username'>users</option>
      </Select> 
    <button type='submit' name='search' class='btn btn-default'>Search</button>
</form>";

echo $out;

$postsFound = isset( $posts );

if ($postsFound){
    $postsHTML = "<ul id='posts'>";
    while ( $post = $posts->fetchObject() ) {
    	//create a list element <li> for each of the entries
        $today = time(); //get today date
        $date_created = $post->date_created; //get date when post was created
        $date_created = strtotime($date_created); 
        $difference = intval(($today - $date_created) / 86400); //calculate the difference between these 2 dates
        if($difference == 0){
            $difference = 'today';
        } else if ($difference == 1){
            $difference .= ' day ago';
        } else {
            $difference .= ' days ago';
        }
    	$postsHTML .=
    	"<li class='list-group-item'><div class='panel panel-default'>
            <div class='panel-heading'>
                <input type='hidden' name='user_id' value='$post->user_id' />
                <h4>$post->username <small> $difference</small></h4>";
        //show delete button if available        
        if($_SESSION['user_id'] == $post->user_id){
            $postsHTML .= "<form method='post'>
                <button type='submit' class='pull-right' name='delete'>
                    <input type='hidden' name='post_id' value='$post->post_id' />
                    <span class='glyphicon glyphicon-trash'></span>
                </button>
            </form>"; 
            $postsHTML .= "<form method='post' action='index.php?page=home'>
                <button type='submit' class='pull-right' name='edit'>
                    <input type='hidden' name='post_id' value='$post->post_id' />
                    <span class='glyphicon glyphicon-pencil'></span>
                </button>
            </form>"; 
        }
        
        $postsHTML .="</div>
                <div class='panel-body'>
                    <h5>$post->post_text</h5>";
        //show image if available
        if(!is_null($post->image)){
            $postsHTML .= "<img src='uploads/$post->image' width='400'>";
        }
        $postsHTML .= "</div>
            </div>
            </li>";         
    }
    $postsHTML .= "</ul>";

    echo $postsHTML;
}

?>
