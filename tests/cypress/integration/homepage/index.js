describe('index', () => {
    it('Open Documentation', () => {
      crypto.visit('/');
      cy.contains('Documentation').click();
      cy.url().should('include', 'laravel.com/docs/');
    })
  })