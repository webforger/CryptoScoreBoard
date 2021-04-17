describe('As a non admin user I try to join admin', () => {
    before(() => {
        cy.login(Cypress.env('defaultEmail'), Cypress.env('defaultPassword'));
        cy.visit('/');
    })
    beforeEach(() => {
        Cypress.Cookies.preserveOnce('cryptoscoreboard_session', 'XSRF-TOKEN')
    })

    it('Navigate to a trading pool', () => {
        cy.get('[data-cy="open_trading_pool"]').first().click();
        cy.url().should('include', '/trading-pool/');
        cy.get('[data-cy="join_pool"]').first().click();
    })

})
