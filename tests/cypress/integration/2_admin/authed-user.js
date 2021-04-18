describe('As a non admin user I try to join admin', () => {
    before(() => {
        Cypress.Cookies.debug(true);
        cy.loginSanctum(Cypress.env('defaultEmail'), Cypress.env('defaultPassword'));
        cy.visit('/');
    })
    beforeEach(() => {
        Cypress.Cookies.preserveOnce('cryptoscoreboard_session', 'XSRF-TOKEN', 'token', 'user')
    })

    it('Navigate to a trading pool', () => {
        cy.get('[data-cy="open_trading_pool"]').first().click();
        cy.url().should('include', '/trading-pool/');
    })

})
