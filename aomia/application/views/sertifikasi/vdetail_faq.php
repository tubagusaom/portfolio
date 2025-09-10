<style media="screen">
.a-tb {
 color: #999;
}

.a-tb:hover {
 color: rgb(0, 103, 244);
}
</style>

      <div role="main" class="main">
      <section class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li>
                  <a href="<?=base_url() ?>" class="a-tb">
                          <i class="fa fa-home"></i> Home
                        </a>
                </li>
                <li class="active">Media Informasi</li>
                <li>
                  <a href="<?=base_url() ?>sertifikasi/faq" class="a-tb">
                          <i class="fa fa-th-large"></i> Faq
                        </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h1>
                      Diskusi FAQ
                    </h1>
            </div>
          </div>
        </div>
      </section>


      <div class="container">
        <div class="row">
          <div class="col-md-12">

	 <h3><?=$faq->pertanyaan?></h3>
     <br/>
     <?=$faq->jawaban?><br/>
     <div id="disqus_thread"></div>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
     */
    /*
    var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://3be.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

</div>
</div></div>
</div>
