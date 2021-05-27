<div class="filter">
    <form action="" method="get" style="display: flex; width: 100%; justify-content: space-between;">
        <div class="item">
            <input type="text" placeholder="Tên sản phẩm " class="keyword-search" name="product_name" >
        </div>
        <div class="item">
            <select name="start_price" id="">
                <option value="">-- Price Start--</option>
                <option value="50000">50.000</option>
                <option value="30000">30.000</option>
                <option value="300000">300.000</option>
                <option value="400000">400.000</option>
                <option value="500000">200.000</option>
            </select>
        </div>
        <div class="item">
            <select name="end_price" id="">
                <option value="">-- Price End --</option>
                <option value="400000">400.000</option>
                <option value="500000">500.000</option>
                <option value="83000">83.000</option>
                <option value="90000">90.000</option>
                <option value="100000">100.000</option>
            </select>
        </div>
        <div class="item">
            <select name="category_id" id="">
                <option value="">--Chọn danh mục--</option>
                <?php if(!empty($categories)) : foreach($categories as $category) : ?>
                    <option value="<?=$category['id']?>"><?= $category['name'] ?></option>
                <?php endforeach; endif; ?>
            </select>
        </div>
        <div class="item">
            <?php if(!empty($_GET['controller']) && $_GET['controller']=='category'):?>
                <input type="hidden" name="controller" value="<?=$_GET['controller']?>" >
                <input type="hidden" name="action" value="<?=$_GET['action'] ?? null?>">
                <input type="hidden" name="id" value="<?=$_GET['id'] ?? null ?>">
            <?php endif;?>
            <button>Tìm Kiếm</button>
        </div>
    </form>
</div>
<style>
    input.keyword-search{
        padding: 10px;
        border: 0;
        border-radius: 20px;
        width:100%;
    }
</style>