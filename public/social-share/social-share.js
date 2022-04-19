/*

Social Share Links:

WhatsApp:
https://wa.me/?text=[post-title] [post-url]

Facebook:
https://www.facebook.com/sharer.php?u=[post-url]

Twitter:
https://twitter.com/share?url=[post-url]&text=[post-title]

Pinterest:
https://pinterest.com/pin/create/bookmarklet/?media=[post-img]&url=[post-url]&is_video=[is_video]&description=[post-title]

LinkedIn:
https://www.linkedin.com/shareArticle?url=[post-url]&title=[post-title]

*/

const facebookBtn = document.querySelector("#facebook");
const twitterBtn = document.querySelector("#twitter");
const linkedinBtn = document.querySelector("#linkedin");
const pinterestBtn = document.querySelector("#pinterest");
const whatsappBtn = document.querySelector("#whatsapp");

function init() {
    const pinterestImg = document.querySelector(".pinterest-img");
    const postTitleText = document.querySelector(".post-title");

    let postUrl = encodeURI(document.location.href);
    let postTitle = encodeURI(`${postTitleText.innerHTML} to see, Please click here: `);
    let postImg = encodeURI(pinterestImg.src);

    facebookBtn.setAttribute(
        "href",
        `https://www.facebook.com/sharer.php?u=${postUrl}`
    );

    twitterBtn.setAttribute(
        "href",
        `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
    );

    pinterestBtn.setAttribute(
        "href",
        `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`
    );

    linkedinBtn.setAttribute(
        "href",
        `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
    );

    whatsappBtn.setAttribute(
        "href",
        `https://wa.me/?text=${postTitle} ${postUrl}`
    );
}

init();
