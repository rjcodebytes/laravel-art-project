document.addEventListener("DOMContentLoaded", function() {
    const structuredData = {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": document.title || "Laravel Art Project",
        "url": window.location.origin,
        "potentialAction": {
            "@type": "SearchAction",
            "target": window.location.origin + "/collection?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    };

    const script = document.createElement("script");
    script.type = "application/ld+json";
    script.text = JSON.stringify(structuredData, null, 2); // pretty print
    document.head.appendChild(script);
});
