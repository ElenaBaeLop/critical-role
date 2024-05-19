<link rel="stylesheet" href="/css/welcome.css">
<x-layout>
    <x-header />
    <section class="welcome-section">
        <div class="fondo-wrapper">
            <img class="fondo" src="/images/fondo.png" alt="Dungeons and Dragons logo">
        </div>
        <article class="campaings-wrapper">
            <div class="logos_wrapper">
                <img class="mini-logo" src="/images/pathfinder_logo.png" alt="Pathfinder logo">
                <img class="mini-logo" src="/images/Call_logo.png" alt="Call of Cthulhu logo">
                <img class="mini-logo" src="/images/Anima_logo.png" alt="Anima logo">
                <img class="mini-logo" src="/images/Vampire_logo.png" alt="Vampire the masquerade logo">
            </div>
            <p class="text">JOIN OVER TEN MILLION PLAYERS AND DMS PLAYING DUNGEONS AND DRAGONS (AND HUNDREDS OF OTHER SYSTEMS) ONLINE</p>
            @auth
                <a class="btn tertiary-btn" href="/join-campaign">Join campaign</a>
            @else
                <a class="btn tertiary-btn" href="/register">Create free account</a>
            @endauth
        </article>
        <article class="community-wrapper">
            <img class="normal-logo" src="/images/community.png" alt="Community logo">
            <div class="info-wrapper">
                <h3 class="title">Community</h3>
                <p class="text">Find people to complete your party or start with a set of new players. You can even find a game already in progress. Everything is possible thanks to our huge and incredible community. When you find them, it's easy to play and connect through Discord.</p>
                @auth
                    <a class="btn tertiary-btn" href="/join-campaign">Join campaign</a>
                @else
                    <a class="btn tertiary-btn" href="/register">Create free account</a>
                @endauth
            </div>
        </article>
        <article class="extra-info-wrapper">
            <p class="text">The Critical Role team is committed to bringing gamers together, no matter the distance. Our objective is to reduce the technical barrier to participants, facilitate the formation of new gaming groups and reduce as much as possible the barriers to participation when what is interesting is the camaraderie that is generated by gathering around a table. To achieve these goals, we seek to offer a sustainable service that represents a resource for the gaming community for as long as necessary.</p>
            <img src="/images/Logo.png" alt="Critical Role logo" class="logo">
        </article>
    </section>
    <x-footer />
</x-layout>
