<section class="pages">
    <div class="container">
        <ul class="pagination">
            <?php if($page > 1): ?>
            <li>
                <a href="?page=<?php echo ($page - 1);?>" class="pagination-left">←</a>
            </li>
            <?php endif; ?>
            <?php for($i = 1; $i <= $total_pages; $i++):?>
            <li>
                <?php 
                if($page == $i)
                {
                    echo "<a href='?page=$i' class='pagination-num active'>$i</a>";
                }
                else
                {
                    echo "<a href='?page=$i' class='pagination-num'>$i</a>";
                }
                ?>
            </li>
            <?php endfor;?>
            <?php if($page < $total_pages): ?>
            <li>
                <a href="?page=<?php echo ($page + 1);?>" class="pagination-right">→</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</section>