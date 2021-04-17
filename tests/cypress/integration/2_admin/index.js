describe('admin', () => {
    before(() => {
        cy.clearCookies()
        cy.login(Cypress.env('adminEmail'),Cypress.env('adminPassword')).visit('/admin/')
    })
    beforeEach(() => {
        Cypress.Cookies.preserveOnce('cryptoscoreboard_session', 'XSRF-TOKEN', 'ugid')
    })

    it('view dashboard', () => {
        cy.contains('Admin Dashboard').click();
        cy.contains('Dashboard');
    })

    it('view my profile', () => {
        cy.contains('TEST ADMIN').click();
        cy.contains('Profile').click();
        cy.url().should('include', 'account');
    })

    it('view every trading pools', () => {
        cy.get('[data-test="dropdown-trading-pools"]').click();
        cy.get('[data-test="view-trading-pools"]').click();
        cy.url().should('include', 'trading-pools');
    })

    it('view one tradingPool', () => {
        cy.visit('/admin/trading-pools/')
        cy.contains('View pool').click();
        cy.url().should('include', 'trading-pool/');
    })

    it('open tradingPool 1', () => {
        cy.visit('/admin/trading-pool/1')
    })

})
