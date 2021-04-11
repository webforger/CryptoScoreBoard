describe('index', () => {
    it('View tradingPools', () => {
      cy.visit('/');
    })

    it('View one tradingPool', () => {
        cy.visit('/');
        cy.contains('View pool').click();
        cy.url().should('include', 'trading-pool/');
    })
  })
