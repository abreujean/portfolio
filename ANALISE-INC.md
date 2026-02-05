# Análise de Dependência dos Arquivos /inc/

## ARQUIVOS ESSENCIAIS ❌ NÃO REMOVER

### 1. theme-setup.php ✅ OBRIGATÓRIO
- **O que faz:** Configurações básicas do tema WordPress
- **Funções principais:**
  - `portfolio_theme_setup()` - Registra menus, suporte a thumbnails, etc.
  - `portfolio_content_width()` - Define largura do conteúdo
  - `portfolio_cleanup()` - Remove recursos desnecessários do WordPress
- **Se remover:** TEMA QUEBRA - Erros fatais de WordPress

### 2. enqueue.php ✅ OBRIGATÓRIO
- **O que faz:** Carrega todos os CSS e JavaScript do tema
- **Funções principais:**
  - `portfolio_enqueue_assets()` - Enfileira estilos e scripts
  - `portfolio_admin_styles()` - Estilos do admin
- **Se remover:** TEMA SEM ESTILOS E SCRIPTS - Visual quebrado

---

## ARQUIVOS DE SEÇÕES (CUSTOMIZER + DATA)

### 3. hero-customizer.php + hero-section.php
- **hero-section.php:** OBRIGATÓRIO se você usa a seção hero
  - Função: `portfolio_get_hero_data()` usada em `templates/hero.php`
  - **Se remover:** Erro fatal - "Call to undefined function"
- **hero-customizer.php:** OPCIONAL (se remover, sem customizer, mas tema funciona)
  - Adiciona opções no Customizer para hero
  - **Se remover:** Só perde a capacidade de editar via Customizer

### 4. about-customizer.php + about-section.php
- **about-section.php:** OBRIGATÓRIO se você usa a seção about
  - Função: `portfolio_get_about_data()` usada em `templates/about.php`
  - **Se remover:** Erro fatal - "Call to undefined function"
- **about-customizer.php:** OPCIONAL
  - Adiciona opções no Customizer para about
  - **Se remover:** Só perde a capacidade de editar via Customizer

### 5. skills-customizer.php + skills-section.php
- **skills-section.php:** OBRIGATÓRIO se você usa a seção skills
  - Função: `portfolio_get_skills_data()` usada em `templates/skills.php`
  - **Se remover:** Erro fatal - "Call to undefined function"
- **skills-customizer.php:** OPCIONAL
  - Adiciona opções no Customizer para skills
  - **Se remover:** Só perde a capacidade de editar via Customizer

### 6. portfolio-customizer.php + portfolio-section.php
- **portfolio-section.php:** OBRIGATÓRIO se você usa a seção portfolio
  - Função: `portfolio_get_portfolio_data()` usada em `templates/portfolio.php`
  - **Se remover:** Erro fatal - "Call to undefined function"
- **portfolio-customizer.php:** OPCIONAL
  - Adiciona opções no Customizer para portfolio
  - **Se remover:** Só perde a capacidade de editar via Customizer

### 7. career-customizer.php + career-section.php
- **career-section.php:** OBRIGATÓRIO se você usa a seção career
  - Função: `portfolio_get_career_data()` usada em `templates/career.php`
  - **Se remover:** Erro fatal - "Call to undefined function"
- **career-customizer.php:** OPCIONAL
  - Adiciona opções no Customizer para career
  - **Se remover:** Só perde a capacidade de editar via Customizer

### 8. recommendations-customizer.php + recommendations-section.php
- **recommendations-section.php:** OBRIGATÓRIO se você usa a seção recommendations
  - Função: `portfolio_get_recommendations_data()` usada em `templates/recommendations.php`
  - **Se remover:** Erro fatal - "Call to undefined function"
- **recommendations-customizer.php:** OPCIONAL
  - Adiciona opções no Customizer para recommendations
  - **Se remover:** Só perde a capacidade de editar via Customizer

### 9. contact-customizer.php + contact-section.php
- **contact-section.php:** OBRIGATÓRIO se você usa a seção contact
  - Função: `portfolio_get_contact_data()` usada em `templates/contact.php`
  - **Se remover:** Erro fatal - "Call to undefined function"
- **contact-customizer.php:** OPCIONAL
  - Adiciona opções no Customizer para contact
  - **Se remover:** Só perde a capacidade de editar via Customizer

### 10. footer-customizer.php + footer-section.php
- **footer-section.php:** OBRIGATÓRIO se você usa a seção footer
  - Função: `portfolio_get_footer_data()` usada em `footer.php`
  - **Se remover:** Erro fatal - "Call to undefined function"
- **footer-customizer.php:** OPCIONAL
  - Adiciona opções no Customizer para footer
  - **Se remover:** Só perde a capacidade de editar via Customizer

---

## RESUMO

| Arquivo | Necessário | Motivo |
|---------|------------|---------|
| theme-setup.php | ✅ SIM | Configurações básicas do WordPress |
| enqueue.php | ✅ SIM | Carrega CSS e JavaScript |
| *-section.php | ⚠️ DEPENDE | Obrigatório se a seção é usada no template |
| *-customizer.php | ❌ NÃO | Opcional, só para edição via Customizer |

## CONCLUSÃO

**NÃO REMOVA:**
1. `theme-setup.php` - Tema quebra sem ele
2. `enqueue.php` - Tema sem estilos e scripts sem ele
3. Todos os `*-section.php` - Se a seção correspondente é usada

**PODE REMOVER (MAS NÃO RECOMENDADO):**
- Todos os `*-customizer.php` - Só perde a capacidade de editar via WordPress Admin
  - Se remover, você precisará editar os valores diretamente no código

**RECOMENDAÇÃO:**
Mantenha TODOS os arquivos atuais. Eles não causam problemas de performance e permitem editar o conteúdo do tema de forma fácil e sem programar.
