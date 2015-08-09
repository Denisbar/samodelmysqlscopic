<?php
$total_pages      = 10;
$page    = (isset($_GET['page']) ? $_GET['page'] : 1);
$initial_num      = 1;
$lastpage       = $total_pages;
$loopcounter = ( ( ( $page + 2 ) <= $lastpage ) ? ( $initial_num + 2 ) : $lastpage );
$startCounter =  ( ( ( $page - 2 ) >= 3 ) ? ( $page - 2 ) : 1 );

if($total_pages > 1)
                {
                    $pagination .= '<ul class="paginate" id="paginate">';
                    $pagination .= '<li><a  href="test.php?page=1" class="paginate_click" id="1-page">First</a></li>';
                    for($i = $startCounter; $i <= $loopcounter; $i++)
                    {

                        $pagination .= '<li><a  href="test.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    $pagination .= '<li><a href="test.php?page='.$total_pages.'" class="paginate_click" id="'.$total_pages.'-page">Last</a></li>';
                    $pagination .= '</ul>';
                }
echo $pagination;
?>