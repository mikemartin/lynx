import LinksListing from './components/links/LinksListing';

Statamic.booting(() => {
    // Listings
    Statamic.$components.register('links-listing', LinksListing);
});