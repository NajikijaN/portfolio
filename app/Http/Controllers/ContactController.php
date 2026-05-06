<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\RedirectResponse;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController extends Controller
{
    public function __invoke(ContactFormRequest $request): RedirectResponse
    {
        $mail = new PHPMailer(true);

        try {
            $this->configureTransport($mail);

            $mail->setFrom(
                (string) config('mail.from.address'),
                (string) config('mail.from.name')
            );
            $mail->addAddress(
                (string) config('mail.to.address', config('mail.from.address')),
                (string) config('mail.to.name', config('mail.from.name'))
            );
            $mail->addReplyTo($request->string('email')->toString(), $request->string('name')->toString());
            $mail->isHTML(false);
            $mail->Subject = 'Nieuw portfolio contactbericht van '.$request->string('name')->toString();
            $mail->Body = implode(PHP_EOL.PHP_EOL, [
                'Naam: '.$request->string('name')->toString(),
                'E-mail: '.$request->string('email')->toString(),
                'Bericht:',
                $request->string('message')->toString(),
            ]);

            $mail->send();
        } catch (PHPMailerException $exception) {
            report($exception);
            header('Location: '.route('welcome').'#contact');

            return back()
                ->withInput()
                ->with('error', 'Er is een fout opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.');

        }
        header('Location: '.route('welcome').'#contact');

        return back()->with('success', 'Je bericht is verzonden. Ik neem snel contact met je op.');
    }

    private function configureTransport(PHPMailer $mail): void
    {
        $mail->isSMTP();
        $mail->Host = (string) config('mail.mailers.smtp.host');
        $mail->SMTPAuth = true;
        $mail->Username = (string) config('mail.mailers.smtp.username');
        $mail->Password = (string) config('mail.mailers.smtp.password');
        $mail->Port = (int) config('mail.mailers.smtp.port');

        $encryption = (string) (config('mail.mailers.smtp.encryption') ?: config('mail.mailers.smtp.scheme'));

        if (in_array($encryption, ['tls', 'starttls'], true)) {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }

        if (in_array($encryption, ['ssl', 'smtps'], true)) {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }
    }
}
