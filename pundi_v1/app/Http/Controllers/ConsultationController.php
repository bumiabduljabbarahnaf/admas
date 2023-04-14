<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

// Models
use App\Models\Logo;
use App\Models\Question;

class ConsultationController extends Controller
{
    public function index()
    {
        $logo = Logo::select('tentang_kami')->first();

        return view('pages.consultation', compact('logo'));
    }

    public function consultation(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'name' => 'required|max:50',
            'consultation' => 'required|max:500'
        ]);

        // Get Param
        $email = $request->email;
        $name = $request->name;
        $consultation = $request->consultation;

        $data = new Consultation();
        $data->email = $email;
        $data->name = $name;
        $data->consultation = $consultation;
        $data->save();

        return redirect()
            ->route('consultation')
            ->withSuccess('Konsultasi berhasil terkirim, Mohon tunggu balasan dari kami.');
    }

    public function question(Request $request)
    {
        $request->validate([
            'emailQuestion' => 'required|email|max:100',
            'nameQuestion' => 'required|max:50',
            'questionQuestion' => 'required|max:500'
        ]);

        $email = $request->emailQuestion;
        $name = $request->nameQuestion;
        $question = $request->questionQuestion;

        $data = new Question();
        $data->email = $email;
        $data->name = $name;
        $data->question = $question;
        $data->save();

        return redirect()
            ->route('consultation')
            ->withSuccess('Pertanyaan berhasil terkirim, Mohon tunggu balasan dari kami.');
    }
}
