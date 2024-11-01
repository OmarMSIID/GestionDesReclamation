<?

namespace App\Enums;

enum ClaimStatus: string
{
    case EN_ATTENTE = 'en attente';
    case OBSERVER = 'observer';
    case ACCEPTE = 'accepté';
    case REFUSE = 'refusé';
}
