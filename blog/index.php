<?php include '../config/constants.php';?>
<?php include '../config/functions.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include '../meta.php' ?>
    <title><?php echo $thename ?>  Blog & News - Insights, Tips, and Latest Updates</title>  
    <meta name="keywords" content="<?php echo $thename ?>, NACOS blog, NACOS MAPOLY blog, Computer Science blog, latest tech blogs by NACOS, NACOS insights, Best Tech Articles for Students, tech tips, Moshood Abiola Polytechnic, nurturing creativity, fostering innovation, educational excellence" />
    <meta name="description" content="Stay updated with the NACOS MAPOLY blog and news! Read about tech trends, programming guides, career tips, innovation insights, student innovations, and more." />

    <meta property="og:title" content="<?php echo $thename ?>  Blog & News - Insights, Tips, and Latest Updates" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="Stay updated with the NACOS MAPOLY blog and news! Read about tech trends, programming guides, career tips, innovation insights, student innovations, and more." />

    <meta name="twitter:title" content="<?php echo $thename ?>  Blog & News - Insights, Tips, and Latest Updates" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="Stay updated with the NACOS MAPOLY blog and news! Read about tech trends, programming guides, career tips, innovation insights, student innovations, and more." />
</head>


<body>
    <?php  include '../header.php'?>

    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="top-title">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url?>"><li title="Home">Home <i class="bi-caret-right-fill"></i></li></a>
                        <a href="<?php echo $website_url?>/blog/"><li title="Blog & Latest Insights">Blog & Latest Insights</li></a>					
                    </ul>
                </div>			
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Blog & Latest News</span></h1>
                <p>Stay updated with the NACOS MAPOLY blog and news! Read about tech trends, programming guides, career tips, innovation insights, student innovations, and more.</p>                
           
                <?php $callclass->_otherPagesBtn($website_url);?>
            </div>
        </div>
    </section>

    <section class="others-pg-content-div">
        <section class="body-div blog-body-div">
            <div class="body-div-in">
                <div class="page-back-div">
                    <div class="right-div sticky-div">
                        <div class="div-in">
                            <h3>SEARCH</h3>
                            <div class="text_field_container">
                                <input class="text_field blog_text_field" id="search_keywords" onkeyup="_fetchListBlog();" type="text" placeholder=""/>
                                <div class="placeholder blog-placeholder">Type Here To Search</div>
                            </div>                                                               
                        </div>
                
                        <div class="div-in">
                            <h3>TAG LIST</h3>

                            <ul id="cat_id">
                                <script>_getBlogCategory();</script>
                            </ul>                                                              
                        </div>                            
                    </div> 

                    <div class="left-div">
                        <div class="page-list-back-div" id="fetchListBlog">
                            <script>_fetchListBlog();</script>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div">
            <div class="body-div-in">
                <div class="related-blog-back-div">
                    <div class="title-div" data-aos="zoom-in" data-aos-duration="1000">
                        <h3>Related Blogs</h3>                
                    </div> 

                    <div class="list-back-div" id="fetchRelatedBlog">
                        <script>_fetchRelatedBlog();</script>                     
                    </div>                
                </div>
            </div>
        </section>
        <?php include '../footer.php'?>
    </section>
 
</body>
</html>


