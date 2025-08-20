<?php
class CommentController
{
    public function index()
    {
        $product = new Product();
        $listData = $product->getList();
        $title = "Trang sản phẩm";
        $view = "admin/list-comment";
        require_once PATH_VIEW_MAIN;
    }
    public function detailComment()
    {
        $comment = new Comment();
        $data = $comment->findCommentByProductId($_GET['id']);
        $title = "Trang danh sách bình luận";
        $view = "admin/detail-comment";
        require_once PATH_VIEW_MAIN;
    }
}
