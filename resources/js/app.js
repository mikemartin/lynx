import LinksListing from './components/links/LinksListing';

Statamic.booting(() => {
    Statamic.$components.register('links-listing', LinksListing);
});