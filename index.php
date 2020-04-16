<?php
require_once('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }

}
else {
    listPosts();
}