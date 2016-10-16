<form class="keyboard-save" role="form" method="POST" id="settings" action="{{ url('admin/settings') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <br>

    <div class="form-group">
        <div class="fg-line">
            <label class="fg-label">Blog Title</label>
            <input type="text" class="form-control" name="blog_title" id="blog_title" value="{{ $data['blogTitle'] }}" placeholder="Blog Title">
        </div>
    </div>

    <br>

    <div class="form-group">
        <div class="fg-line">
            <label class="fg-label">Blog Subtitle</label>
            <input type="text" class="form-control" name="blog_subtitle" id="blog_subtitle" value="{{ $data['blogSubtitle'] }}" placeholder="Blog Subtitle">
        </div>
        <small>In a few words, explain what this site is about.</small>
    </div>

    <br>

    <div class="form-group">
        <div class="fg-line">
            <label class="fg-label">Blog Description</label>
            <input type="text" class="form-control" name="blog_description" id="blog_description" value="{{ $data['blogDescription'] }}" placeholder="Blog Description">
        </div>
        <small>Set the blog description that you would like to add to the <code>description</code> meta tag.</small>
    </div>

    <br>

    <div class="form-group">
        <div class="fg-line">
            <label class="fg-label">Blog SEO</label>
            <input type="text" class="form-control" name="blog_seo" id="blog_seo" value="{{ $data['blogSeo'] }}" placeholder="Blog SEO">
        </div>
        <small>Define in comma-delimited form the blog SEO tags that you want in the <code>keywords</code> meta tag.</small>
    </div>

    <br>

    <div class="form-group">
        <div class="fg-line">
            <label class="fg-label">Blog Author</label>
            <input type="text" class="form-control" name="blog_author" id="blog_author" value="{{ $data['blogAuthor'] }}" placeholder="Blog Author">
        </div>
        <small>Set the name that you want to appear in the <code>author</code> meta tag.</small>
    </div>

    <br>

    <div class="form-group">
        <div class="fg-line">
            <label class="fg-label"><i class="zmdi zmdi-disqus"></i> Disqus</label>
            <input type="text" class="form-control" name="disqus_name" id="disqus_name" value="{{ $data['disqus'] }}" placeholder="Disqus Shortname">
        </div>
        <small>Enter your Disqus shortname to enable comments in your blog posts or <a href="https://github.com/austintoddj/canvas#advanced-options" target="_blank">learn more about this option</a>.</small>
    </div>

    <br>

    <div class="form-group">
        <div class="fg-line">
            <label class="fg-label"><i class="zmdi zmdi-trending-up"></i> Google Analytics</label>
            <input type="text" class="form-control" name="ga_id" id="ga_id" value="{{ $data['analytics'] }}" placeholder="Google Analytics Tracking ID">
        </div>
        <small>Enter your Google Analytics Tracking ID or <a href="https://github.com/austintoddj/canvas#advanced-options" target="_blank">learn more about this option</a>.</small>
    </div>

    <br>

    <div class="form-group">
        <div class="fg-line">
            <label class="fg-label"><i class="zmdi zmdi-twitter-box"></i> Twitter Card Type</label>
            <select name="twitter_card_type" id="twitter_card_type" class="selectpicker">
                <option @if ($data['twitterCardType'] == "none") selected @endif value="none">No card</option>
                <option @if ($data['twitterCardType'] == "summary") selected @endif value="summary">Summary card</option>
                <option @if ($data['twitterCardType'] == "summary_large_image") selected @endif value="summary_large_image">Summary card with large image</option>
            </select>
        </div>
        <small>Configure the way Twitter <a href="https://cards-dev.twitter.com/validator" target="_blank">displays links to your blog</a> or <a href="https://dev.twitter.com/cards/overview" target="_blank">learn more about this option</a>.</small>
    </div>

    <br>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> Save</button>
    </div>
</form>
