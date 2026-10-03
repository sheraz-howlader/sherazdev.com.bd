## General Rules

- Always follow the Service Pattern.
- Never put business logic inside Controllers.
- Keep Controllers thin.
- Write clean, readable and maintainable code.
- Follow SOLID principles.
- Follow PSR-12 coding standards.
- Prefer dependency injection over static calls.
- Reuse existing code instead of duplicating logic.
- Always check existing implementation before creating new classes.

---

## Project Architecture

### Controller

Controllers should only:

- Validate requests.
- Call Services.

Never write business logic inside controllers.

---

### Service

All business logic must be inside Service classes.

Example:

```
Controller
    ↓
Service
    ↓
Repository / Model
```

---

### Repository

Repositories should only handle database operations.

Never place business logic inside repositories.

---

### Validation

- Use Form Request classes.
- Never validate directly inside controllers unless extremely simple.

---

### Models

Models should only contain:

- Relationships
- Scopes
- Accessors & Mutators
- Casts

Avoid putting business logic inside models.

---

## API

- Always use API Resources.
- Return consistent JSON responses.
- Never return raw models.

Example:

```
{
    "success": true,
    "message": "...",
    "data": {}
}
```

---

## Database

- Use eager loading to avoid N+1 problems.
- Never use `DB::table()` when Eloquent is appropriate.
- Wrap critical operations inside transactions.

---

## Naming Convention

Services:

```
UserService
OrderService
InvoiceService
```

Repositories:

```
UserRepository
OrderRepository
```

Requests:

```
StoreUserRequest
UpdateUserRequest
```

Resources:

```
UserResource
OrderResource
```

---

## Testing

- Do **not** write any type of test case.
- Do **not** create Unit Tests.
- Do **not** create Feature Tests.
- Do **not** create Integration Tests.
- Do **not** create Browser (Dusk) Tests.
- Do **not** generate any testing-related files unless explicitly requested.

---

## Error Handling

- Throw custom exceptions where appropriate.
- Never swallow exceptions.
- Log unexpected errors.

---

## Code Style

- Prefer early return.
- Keep methods under ~40 lines whenever possible.
- Keep classes focused on a single responsibility.
- Use meaningful variable names.
- Avoid nested if statements.
- Use UUID where applicable.
- Write migrations with proper foreign keys and indexes.
- Use DB::transaction() for multi-table operations.
- Never use env() outside config files.
- Keep all constants in Enums or Config.
- don't write any type of test case

Prefer:

```
if (!$user) {
    return;
}
```

instead of

```
if ($user) {
    ...
}
```

---

## Laravel Best Practices

Always prefer:

- Route Model Binding
- Enums
- Value Objects (when applicable)
- Collections
- Carbon
- Config files over hardcoded values

Avoid:

- Facades when dependency injection is cleaner.
- Magic numbers.
- Hardcoded strings.

---

## Performance

- Use eager loading.
- Cache expensive queries.
- Queue heavy jobs.
- Chunk large datasets.

---

## Keep Blade Files Clean

Rules:

- Blade files must be responsible only for presentation (UI).
- Do **not** write business logic inside Blade files.
- Avoid complex conditions, calculations, database queries, or data processing in Blade.

Correct Approach:

If any business logic is required:

- Create a dedicated Helper class, Service class, or ViewModel.
- Process the data before passing it to the view.
- Keep Blade focused only on rendering.

❌ Don't

```blade
@php
$total = 0;
foreach ($orders as $order) {
    $total += $order->amount;
}
@endphp
```

✅ Do

```php
// Helper Class
$total = OrderHelper::calculateTotal($orders);

return view('orders.index', compact('total'));
```

```blade
{{ $total }}
```

---

### Prefer jQuery Over Raw JavaScript

Rules

- Avoid using vanilla JavaScript whenever possible.
- Use **jQuery** for DOM manipulation, events, AJAX, and UI interactions.
- Keep JavaScript code consistent throughout the project.

❌ Don't

```javascript
document.getElementById('btn').addEventListener(...)
```

✅ Do

```javascript
$('#btn').on('click', function () {

});
```

---

### Delete Actions

All delete operations must use:

- jQuery AJAX
- SweetAlert2
- Laravel-generated route URLs
- Existing CSRF-protected delete forms

Requirements:

1. Ask for confirmation using SweetAlert2.
2. After confirmation, submit the delete request through jQuery AJAX.
3. Use `beforeSend`, `success`, and `error` callbacks.
4. In `beforeSend`:
   - Disable the delete button.
   - Show a non-dismissible loading alert.
5. In `success`:
   - Do not reload the page.
   - Fade out and remove the deleted table row from the DOM.
   - Show the backend success message.
6. In `error`:
   - Re-enable the delete button.
   - Show the backend error message.
7. Never use the browser's default `confirm()` dialog.
8. The backend must return consistent JSON for AJAX requests:

```javascript
{
    "success": true,
    "message": "Record deleted successfully.",
    "data": {}
}
```

Example:

```javascript
$('.delete').on('click', async function () {
    const $button = $(this);
    const $form = $button.closest('form');
    const $row = $button.closest('tr');

    const confirmation = await Swal.fire({
        text: 'Are you sure you want to delete this record?',
        icon: 'warning',
        showCancelButton: true,
    });

    if (!confirmation.isConfirmed) {
        return;
    }

    $.ajax({
        url: $form.attr('action'),
        method: 'POST',
        data: $form.serialize(),
        headers: {
            Accept: 'application/json',
        },
        beforeSend: function () {
            $button.prop('disabled', true);

            Swal.fire({
                title: 'Processing your request...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => Swal.showLoading(),
            });
        },
        success: function (response) {
            $row.fadeOut(300, function () {
                $(this).remove();
            });

            Swal.fire({
                icon: 'success',
                text: response.message,
                timer: 1200,
                showConfirmButton: false,
            });
        },
        error: function (xhr) {
            $button.prop('disabled', false);

            Swal.fire({
                icon: 'error',
                title: 'Unable to delete',
                text: xhr.responseJSON?.message
                    || 'Something went wrong. Please try again.',
            });
        },
    });
});
```

---

### Modal Behavior

For every modal:

Requirements:
- use same modal for create and update
- Do not preload unnecessary modal content.
- Load modal content only when required.
- Fetch modal data through AJAX.
- Clicking outside the modal **must not** close it.
- Pressing **ESC** should not close the modal (if applicable).
- While AJAX/content is loading:
  - Modal must remain open.
  - Outside clicks must not dismiss the modal.
  - User should not be able to accidentally close the modal.

Example (Bootstrap):

```javascript
$('#exampleModal').modal({
    backdrop: 'static',
    keyboard: false
});
```

---

### JavaScript and jQuery Structure

 - These rules apply **only when Create or Edit functionality uses a modal**.
 - If Create/Edit uses a dedicated page, follow the normal Laravel page flow. AJAX modal loading is not required.
 - All Create and Edit modals must load their form content dynamically through jQuery AJAX.

#### Event-Driven Code

- Keep JavaScript event-driven and easy to follow.
- Prefer placing action-specific logic directly inside its related jQuery event handler.
- Do not create unnecessary small helper functions.
- Create helper functions only when the same logic is reused in multiple places or is too complex for one handler.
- Keep Create and Edit behavior inside one shared click handler.
- Keep form submission inside one delegated submit handler.
- Keep Delete behavior inside one dedicated click handler.
- Use action-specific class names such as:
  - `.create-team`
  - `.edit-team`
  - `.view-team`
  - `.delete-team`

Preferred structure:

```javascript
$(document).on('click', '.create-team, .edit-team', function () {
    // Load the create/edit form and open the shared modal.
});

$('#teamFormModal').on('submit', '#teamForm', function (event) {
    event.preventDefault();

    // Submit the dynamically loaded form through AJAX.
});

$(document).on('click', '.delete-team', async function () {
    // Confirm and delete the record through AJAX.
});
```

#### Backend JSON Response

Create and Update AJAX requests must return a consistent JSON response using an API Resource:

```php
return response()->json([
    'success' => true,
    'message' => 'Team updated successfully.',
    'data' => TeamResource::make($team)->resolve(),
]);
```

---

### URLs Inside jQuery

Never hardcode application URLs.

Always generate URLs using Laravel's routing helpers.

❌ Don't

```javascript
url: '/users/delete/5'
```

✅ Do

```blade
url: "{{ route('users.destroy', $user->id) }}"
```

or

```blade
url: "{{ route('users.store') }}"
```

Using Laravel routes ensures:

- Better maintainability
- Route changes without JavaScript modifications
- Cleaner and safer code

---

### General Principles

- Keep Blade files lightweight.
- Keep JavaScript organized and readable.
- Separate presentation from business logic.
- Reuse helper classes whenever logic is shared.
- Maintain consistency across all Blade views.

---

## Security

- Validate every input.
- Authorize every protected action.
- Never trust client input.
- Escape output where necessary.

---

## Before Writing Code

Always check:

1. Does similar code already exist?
2. Can this be reused?
3. Is this following the Service Pattern?
4. Is the controller thin?
5. Is the code testable?
6. Does it follow SOLID?

If the answer is "No", refactor before adding new code.

---

## When Modifying Existing Code

- Preserve coding style.
- Do not introduce breaking changes unless requested.
- Update related services if necessary.
- Keep backward compatibility whenever possible.

---

## Response Style

When generating code:

- Explain the approach briefly.
- Generate production-ready code.
- Include necessary imports.
- Avoid unnecessary comments.
- Do not generate placeholder code unless requested.

---

## Existing Code

Before creating any file:

- Inspect the existing codebase.
- Reuse existing Services, Traits, Helpers, Resources, Requests, and Repositories.
- Follow the existing naming conventions.
- Do not introduce a new architecture if one already exists.

---

## Response Requirements

Always:

- Explain your plan first.
- List the files you will modify.
- Ask before making breaking changes.
- Generate complete production-ready code.
- Do not generate placeholder implementations.
- Keep code clean and maintainable.
