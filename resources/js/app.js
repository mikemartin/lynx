import LinkListing from './components/links/Listing';

Statamic.booting(() => {
    // Listings
    Statamic.$components.register('bitlynx-link-list', LinkListing);
});