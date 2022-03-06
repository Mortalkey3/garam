<?php
$this->breadcrumbs=array(
    'Dashboard',
);
?>
    
<div class="pageheader">
    
    <div class="pageicon"><span class="fa fa-laptop"></span></div>
    <div class="pagetitle">
        <h5>All Features Summary</h5>
        <h1>Dashboard</h1>
    </div>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">
        <div class="row-fluid">
            <div id="dashboard-left" class="span8">
                    <h5 class="subtitle">Menu</h5>

                    <ul class="shortcuts">
                        <li class="events">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/product/index')); ?>">
                                <i class="icon-cms fa fa-tag"></i>
                                <span class="shortcuts-label">Products</span>
                            </a>
                        </li>
                        <?php /*
                        <li class="products">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/index')); ?>">
                                <i class="icon-cms fa fa-image"></i>
                                <span class="shortcuts-label">Slide</span>
                            </a>
                        </li>
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>">
                                <i class="icon-cms fa fa-info"></i>
                                <span class="shortcuts-label">About Us</span>
                            </a>
                        </li>
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/healty/index')); ?>">
                                <i class="icon-cms fa fa-heart"></i>
                                <span class="shortcuts-label">Healty</span>
                            </a>
                        </li>
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/gema/index')); ?>">
                                <i class="icon-cms fa fa-group"></i>
                                <span class="shortcuts-label">ge-ma</span>
                            </a>
                        </li>
                        */ ?>
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/contact/index')); ?>">
                                <i class="icon-cms fa fa-phone"></i>
                                <span class="shortcuts-label">Contact Us</span>
                            </a>
                        </li>

                </ul>

                <br />

            </div> <!-- span-8 -->
            
            <div id="dashboard-right" class="span4">
                
                <h5 class="subtitle">Announcements</h5>
                
                <div class="divider15"></div>
                
                <div class="alert alert-block">
                      <!-- <button data-dismiss="alert" class="close" type="button">&times;</button>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est sequi quis reiciendis mollitia.</p> -->
                      <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
                        <!-- Histats.com  START  (aync)-->
                        <script type="text/javascript">var _Hasync= _Hasync|| [];
                        _Hasync.push(['Histats.start', '1,3894290,4,422,112,75,00011111']);
                        _Hasync.push(['Histats.fasi', '1']);
                        _Hasync.push(['Histats.track_hits', '']);
                        (function() {
                        var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
                        hs.src = ('//s10.histats.com/js15_as.js');
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                        })();</script>
                        <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3894290&101" alt="free web site hit counter" border="0"></a></noscript>
                        <!-- Histats.com  END  -->
                        <h4>User Gude</h4>
                        <p>User guide bisa di lihat <a href="<?php echo Yii::app()->baseUrl ?>/images/user-guide-cheetham-cms.pdf" target="_blank">di sini</a></p>
                </div><!--alert-->
                
                                        
            </div><!--span4-->
        </div><!--row-fluid-->
        
        <div class="footer">
            <div class="footer-left">
                <span>Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name ?>.</span>
            </div>
            <div class="footer-right">
                <span>All Rights Reserved. Developed By <a target="_blank" href="http://markdesign.net">Markdesign</a></span>
            </div>
        </div><!--footer-->
        
    </div><!--maincontentinner-->
</div><!--maincontent-->


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
        datasets: [{
            label: '# Penjualan',
            data: [750000, 850000, 1000000, 650000, 950000, 780000, 985000],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        },
        {
            label: '# Jumlah Transaksi',
            data: [8, 10, 11, 7, 6, 11, 15],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            // backgroundColor: [
            //     'rgba(255, 99, 132, 0.2)',
            //     'rgba(54, 162, 235, 0.2)',
            //     'rgba(255, 206, 86, 0.2)',
            //     'rgba(75, 192, 192, 0.2)',
            //     'rgba(153, 102, 255, 0.2)',
            //     'rgba(255, 159, 64, 0.2)'
            // ],
            // 
            // borderColor: [
            //     'rgba(255,99,132,1)',
            //     'rgba(54, 162, 235, 1)',
            //     'rgba(255, 206, 86, 1)',
            //     'rgba(75, 192, 192, 1)',
            //     'rgba(153, 102, 255, 1)',
            //     'rgba(255, 159, 64, 1)'
            // ],
            borderWidth: 1
        }, {
            label: '# Transaksi Berhasil',
            data: [6, 10, 10, 6, 6, 9, 12],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>
