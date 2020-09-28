let doc = new DocumentContainer();

doc.onLoaded = function () {

    let builder = new UrlBuilder("/search");
    builder.addParameter("q", "search");
    builder.addParameter("name", "urs");

    (new Debug).write(builder.getUrl());

};