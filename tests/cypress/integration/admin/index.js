describe('admin', () => {
    before(() => {
        cy.login(Cypress.env('adminEmail'),Cypress.env('adminPassword')).visit('/admin/')
    })
    beforeEach(() => {
        Cypress.Cookies.preserveOnce('cryptoscoreboard_session', 'XSRF-TOKEN')
    })

    it('view one tradingPool', () => {
        cy.contains('View pool').click();
        cy.url().should('include', 'trading-pool/');
    })

    it('view my profile', () => {
        cy.contains('TEST ADMIN').click();
        cy.contains('Profile').click();
        cy.url().should('include', 'account');
    })
})
